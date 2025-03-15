#!/bin/bash

psql -U ${POSTGRES_USER} <<-END
	GRANT USAGE, SELECT ON SEQUENCE bookings_bookid_seq TO ${DB_ANON_ROLE};
	GRANT USAGE, SELECT ON SEQUENCE facilities_facid_seq TO ${DB_ANON_ROLE};
	GRANT USAGE, SELECT ON SEQUENCE members_memid_seq TO ${DB_ANON_ROLE};
END