--
-- PostgreSQL database dump
--

-- Dumped from database version 13.0 (Debian 13.0-1.pgdg100+1)
-- Dumped by pg_dump version 13.0 (Debian 13.0-1.pgdg100+1)



------------------------------------------------------------------------
------------------ SALTCORN TABLES -------------------------------------
------------------------------------------------------------------------
SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';
SET SCHEMA 'public';
SET default_table_access_method = heap;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

------------------------------------------------------------------------
------------------ bookings TABLES -------------------------------------
------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS facilities (
    facid serial UNIQUE NOT NULL,
    name varchar(50) NOT NULL,
    membercost decimal(6,2) NOT NULL,
    guestcost decimal(6,2) NOT NULL,
    monthlymaintenance numeric NOT NULL,
    is_available boolean,
    PRIMARY KEY (facid)
);

-- TOC entry 170 (class 1259 OID 32800)
-- Name: members; Type: TABLE; Schema: cd; Owner: -; Tablespace:
--

CREATE TABLE IF NOT EXISTS members (
    memid serial UNIQUE NOT NULL,
    surname varchar(50) NOT NULL,
    firstname varchar(50) NOT NULL,
    email varchar(50) NOT NULL,
    telephone varchar(20) NOT NULL,
    is_active boolean,
    joindate DATE,
    recommendedby integer,
    PRIMARY KEY (memid),
    FOREIGN KEY (recommendedby) REFERENCES members(memid) ON DELETE SET NULL
);


CREATE TABLE IF NOT EXISTS bookings (
    bookid serial UNIQUE NOT NULL,
    facid INT,
    memid integer,
    starttime timestamp without time zone NOT NULL,
    slots integer NOT NULL,
    PRIMARY KEY (bookid),
    FOREIGN KEY (facid) REFERENCES facilities(facid) ON DELETE SET NULL,
    FOREIGN KEY (memid) REFERENCES members(memid) ON DELETE SET NULL
);


CREATE VIEW bookings_view 
AS SELECT a.surname, b.starttime, b.slots, c.name 
FROM members a, bookings b, facilities c 
WHERE a.memid = b.memid and c.facid = b.facid 
ORDER BY 2,3;

CREATE INDEX "bookings.memid_facid"
  ON bookings
  USING btree
  (memid, facid);

CREATE INDEX "bookings.facid_memid"
  ON bookings
  USING btree
  (facid, memid);

CREATE INDEX "bookings.facid_starttime"
  ON bookings
  USING btree
  (facid, starttime);

CREATE INDEX "bookings.memid_starttime"
  ON bookings
  USING btree
  (memid, starttime);

CREATE INDEX "bookings.starttime"
  ON bookings
  USING btree
  (starttime);

CREATE INDEX "members.joindate"
  ON members
  USING btree
  (joindate);

CREATE INDEX "members.recommendedby"
  ON members
  USING btree
  (recommendedby);
