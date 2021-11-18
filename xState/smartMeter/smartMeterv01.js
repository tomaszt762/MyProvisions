const smartMeter = Machine(
    {
      id: "smartMeter01",
      type: "parallel",
      context:
      {
        meterId: null,
        wattage: 0,
        wattageGain: 0,
        wattageGainInterval: null,
        intervalValue: 1,
        authKey: '',
        logs: [],
        intervalId: null,
        finalUrl: ''
      },

      states:
      {
        listening:
        {

          initial: "waitingForOrder",
          states:
          {
            waitingForOrder:
            {
              on:
              {

              }
            }
          }

        },
        running:
        {
          initial: "idle",
          states:
          {
            off:
            {
              on:
              {
              }
            },
            ready:
            {
              on:
              {
              }
            },
            run:
            {
              on:
              {
              }
            },
            idle:
            {
              on:
              {
              }
            },
            fault:
            {
              on:
              {
              }
            }
          }

        }

      }
    }
    
    
    
    
  log: function () {
      axios.post(this.finalUrl, {
        meterId: this.meterId,
        meterValue: this.wattage,
        timestamp: this.toIsoLocal(new Date())
      }, {
        params: {
          authKey: this.authKey
        }
      })
          .then(result => {
            if (result.status === 201) {
              this.logs.push({
                'msg': 'Created',
                'status': 201,
                'total': this.wattage,
                'timestamp': (new Date()).toLocaleString('de-DE')
              })
            }
          })
          .catch(error => {
            // TODO display error
            console.error(error)
            this.logs.push({
              'msg': `ERROR: ${error.message}`,
              'status': error.status,
              'timestamp': (new Date()).toLocaleString('de-DE')
            })
          })
    },
    gainWattage: function () {
      this.wattageGainInterval = setInterval(function () {
        this.wattage += this.wattageGain
      }.bind(this), 1000)
    },
    toIsoLocal: function toISOLocal(d) {
      const z = n => ('0' + n).slice(-2);
      const zz = n => ('00' + n).slice(-3);
      let off = d.getTimezoneOffset();
      const sign = off < 0 ? '+' : '-';
      off = Math.abs(off);
      return d.getFullYear() + '-'
          + z(d.getMonth()+1) + '-' +
          z(d.getDate()) + 'T' +
          z(d.getHours()) + ':'  +
          z(d.getMinutes()) + ':' +
          z(d.getSeconds()) + '.' +
          zz(d.getMilliseconds()) +
          sign + z(off/60|0) + ':' + z(off%60);
    }
  }