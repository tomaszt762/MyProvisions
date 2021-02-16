jQuery (function ($) {

  if (!Array.prototype.includes) {
    //or use Object.defineProperty
    Array.prototype.includes = function(search){
     return !!~this.indexOf(search);
    }
  }

  // To prevent replacement of regexp pattern with CDN url (CDN code bug)
  var host_regexp = new RegExp (':' + '\\/' + '\\/(.[^/:]+)', 'i');

  function getHostName (url) {
//    var match = url.match (/:\/\/(.[^/:]+)/i);
    var match = url.match (host_regexp);
    if (match != null && match.length > 1 && typeof match [1] === 'string' && match [1].length > 0) {
      return match [1].toLowerCase();
    } else {
        return null;
      }
  }

  function ai_get_date (date_time_string) {
    var date_time;

    try {
      date_time = Date.parse (date_time_string);
      if (isNaN (date_time)) date_time = null;
    } catch (error) {
      date_time = null;
    }

    // Try to parse separately date and time
    if (date_time == null && date_time_string.includes (' ')) {
      var date_time_parts = date_time_string.split (' ');

      try {
        date_time = Date.parse (date_time_parts [0]);

        if (date_time_parts [1].includes (':')) {
          var time_parts = date_time_parts [1].split (':');
          date_time += (parseInt (time_parts [0]) * 3600 + parseInt (time_parts [1]) * 60 + parseInt (time_parts [2])) * 1000;
        }

        if (isNaN (date_time)) date_time = null;
      } catch (error) {
        date_time = null;
      }
    }

    return date_time;
  }

  function ai_install_tcf_callback_useractioncomplete () {
    if ((jQuery('#ai-iab-tcf-bar').length || jQuery('.ai-list-manual').length) && typeof __tcfapi == 'function' && typeof ai_load_blocks == 'function' && typeof ai_iab_tcf_callback_installed == 'undefined') {

      function ai_iab_tcf_callback (tcData, success) {
        if (success) {
          if (tcData.eventStatus === 'useractioncomplete') {
            ai_tcData = tcData;

            ai_load_blocks ();

            jQuery('#ai-iab-tcf-status').text ('DATA LOADED');
            jQuery('#ai-iab-tcf-bar').addClass ('status-ok').removeClass ('status-error');
          }
        }
      }

      __tcfapi ('addEventListener', 2, ai_iab_tcf_callback);

      ai_iab_tcf_callback_installed = true;
    }
  }

  ai_process_lists = function (ai_list_blocks) {

    function ai_structured_data_item (indexes, data, value) {

      var ai_debug = typeof ai_debugging !== 'undefined'; // 1
//      var ai_debug = false;

      if (ai_debug) console.log ('');
      if (ai_debug) console.log ("AI LISTS COOKIE SELECTOR INDEXES", indexes);

      if (indexes.length == 0) {
        if (ai_debug) console.log ("AI LISTS COOKIE TEST ONLY PRESENCE", value == '!@!');

        if (value == '!@!') return true;

//        if (ai_debug) console.log ("AI LISTS COOKIE TEST VALUE", data, '==', value, '?', data == value);

        var check = data == value;

        var new_value = false;
        if (!check) {
          if (value.toLowerCase () == 'true') {
            value = true;
            new_value = true;
          } else
          if (value.toLowerCase () == 'false') {
            value = false;
            new_value = true;
          }

          if (new_value) {
//            if (ai_debug) console.log ("AI LISTS COOKIE TEST VALUE", data, '==', value, '?', data == value);
            check = data == value;
          }
        }

        if (ai_debug) console.log ("AI LISTS COOKIE TEST VALUE", data, '==', value, '?', data == value);

        return data == value;
      }

      if (typeof data != 'object' && typeof data != 'array') return false;

      var index = indexes [0];
      // Do not change indexes
      var new_indexes = indexes.slice (1);

      if (ai_debug) console.log ("AI LISTS COOKIE SELECTOR INDEX", index);

      if (index == '*') {
        for (let [data_index, data_item] of Object.entries (data)) {
          if (ai_debug) console.log ("AI LISTS COOKIE SELECTOR *", `${data_index}: ${data_item}`);

          if (ai_structured_data_item (new_indexes, data_item, value)) return true;
        }
      }
      else if (index in data) {
        if (ai_debug) console.log ('AI LISTS COOKIE SELECTOR CHECK [' + index + ']');

        return ai_structured_data_item (new_indexes, data [index], value);
      }

      if (ai_debug) console.log ("AI LISTS COOKIE SELECTOR NOT FOUND", index, 'in', data);
      if (ai_debug) console.log ('');

      return false;
    }

    function ai_structured_data (data, selector, value) {
      if (typeof data != 'object') return false;
      if (selector.indexOf ('[') == - 1) return false;

      var indexes = selector.replace (/]| /gi, '').split ('[');

      return ai_structured_data_item (indexes, data, value);
    }

    function call__tcfapi () {

      var ai_debug = typeof ai_debugging !== 'undefined'; // 2
//      var ai_debug = false;

      if (typeof __tcfapi == 'function') {

        if (ai_debug) console.log ("AI LISTS COOKIE tcf-v2: calling __tcfapi getTCData");

        $('#ai-iab-tcf-status').text ('DETECTED');

        __tcfapi ('getTCData', 2, function (tcData, success) {
          if (success) {
            $('#ai-iab-tcf-bar').addClass ('status-ok');

            if (tcData.eventStatus == 'tcloaded' || tcData.eventStatus == 'useractioncomplete') {
              ai_tcData = tcData;

              if (!tcData.gdprApplies) {
                jQuery('#ai-iab-tcf-status').text ('GDPR DOES NOT APPLY');
              } else {
                  $('#ai-iab-tcf-status').text ('DATA LOADED');
                }
              $('#ai-iab-tcf-bar').addClass ('status-ok').removeClass ('status-error');

              setTimeout (function () {ai_process_lists ();}, 10);

              if (ai_debug) console.log ("AI LISTS COOKIE tcf-v2: __tcfapi getTCData success", ai_tcData);
            } else
            if (tcData.eventStatus == 'cmpuishown') {
              ai_cmpuishown = true;

              if (ai_debug) console.log ("AI LISTS COOKIE __tcfapi cmpuishown");

              $('#ai-iab-tcf-status').text ('CMP UI SHOWN');
              $('#ai-iab-tcf-bar').addClass ('status-ok').removeClass ('status-error');

            } else {
                if (ai_debug) console.log ("AI LISTS COOKIE tcf-v2: __tcfapi getTCData, invalid status", tcData.eventStatus);
              }
          } else {
              if (ai_debug) console.log ("AI LISTS COOKIE tcf-v2: __tcfapi getTCData failed");

              $('#ai-iab-tcf-status').text ('__tcfapi getTCData failed');
              $('#ai-iab-tcf-bar').removeClass ('status-ok').addClass ('status-error');
            }
        });
      }
    }

    function check_and_call__tcfapi (show_error) {

      var ai_debug = typeof ai_debugging !== 'undefined'; // 3
//      var ai_debug = false;

      if (typeof __tcfapi == 'function') {

        if (typeof ai_iab_tcf_callback_installed == 'undefined') {
          if (ai_debug) console.log ("AI LISTS COOKIE tcf-v2: callback for useractioncomplete not installed yet");

          ai_install_tcf_callback_useractioncomplete ();
        }

        if (typeof ai_tcData_requested == 'undefined') {
          ai_tcData_requested = true;

          call__tcfapi ();

          url_parameters_need_tcData = true;
        } else {
            if (ai_debug) console.log ("AI LISTS COOKIE tcf-v2: tcData already requested");
          }
      } else {
          if (show_error) {
            if (ai_debug) console.log ("AI LISTS COOKIE tcf-v2: __tcfapi function not found");

            $('#ai-iab-tcf-bar').addClass ('status-error').removeClass ('status-ok');
            $('#ai-iab-tcf-status').text ('MISSING: __tcfapi function not found');
          }
        }
    }



    if (ai_list_blocks == null) {
//      ai_list_blocks = $("div.ai-list-data");
      ai_list_blocks = $("div.ai-list-data, meta.ai-list-data");
    } else {
        ai_list_blocks = ai_list_blocks.filter ('.ai-list-data');
      }

    var ai_debug = typeof ai_debugging !== 'undefined'; // 4
//    var ai_debug = false;

    if (!ai_list_blocks.length) return;

    if (ai_debug) console.log ("AI LISTS:", ai_list_blocks.length, 'blocks');

    // Mark lists as processed
    ai_list_blocks.removeClass ('ai-list-data');

    var cookies  = document.cookie.split (";");
//    var ai_iab_tcf_2_bar = false;
//    var ai_iab_tcf_2_status = '';
//    var ai_iab_tcf_2_info = '';

    cookies.forEach (function (cookie, index) {
      cookies [index] = cookie.trim();
    });

    var url_parameters = getAllUrlParams (window.location.search);
    if (url_parameters ['referrer'] != null) {
      var referrer = url_parameters ['referrer'];
    } else {
        var referrer = document.referrer;
        if (referrer != '') referrer = getHostName (referrer);
      }

    var user_agent = window.navigator.userAgent;
    var user_agent_lc = user_agent.toLowerCase ();

    if (typeof MobileDetect !== "undefined") {
      var md = new MobileDetect (user_agent);
    }

    ai_list_blocks.each (function () {

      var block_wrapping_div = $(this).closest ('div.AI_FUNCT_GET_BLOCK_CLASS_NAME');

      if (ai_debug) console.log ('AI LISTS BLOCK', block_wrapping_div.attr ('class'));

      var enable_block = true;

      var referer_list = $(this).attr ("referer-list");
      if (typeof referer_list != "undefined") {
        var referer_list_array  = b64d (referer_list).split (",");
        var referers_list_type  = $(this).attr ("referer-list-type");

        if (ai_debug) console.log ("AI LISTS referer:     ", referrer);
        if (ai_debug) console.log ("AI LISTS referer list:", b64d (referer_list), referers_list_type);

        var found = false;
        $.each (referer_list_array, function (index, list_referer) {
          if (list_referer == '') return true;

          if (list_referer.charAt (0) == "*") {
            if (list_referer.charAt (list_referer.length - 1) == "*") {
              list_referer = list_referer.substr (1, list_referer.length - 2);
              if (referrer.indexOf (list_referer) != - 1) {
                found = true;
                return false;
              }
            } else {
                list_referer = list_referer.substr (1);
                if (referrer.substr (- list_referer.length) == list_referer) {
                  found = true;
                  return false;
                }
              }
          }
          else if (list_referer.charAt (list_referer.length - 1) == "*") {
            list_referer = list_referer.substr (0, list_referer.length - 1);
            if (referrer.indexOf (list_referer) == 0) {
              found = true;
              return false;
            }
          }
          else if (list_referer == '#') {
            if (referrer == "") {
              found = true;
              return false;
            }
          }
          else if (list_referer == referrer) {
            found = true;
            return false;
          }
        });

        switch (referers_list_type) {
          case "B":
            if (found) enable_block = false;
            break;
          case "W":
            if (!found) enable_block = false;
            break;
        }

        if (ai_debug) console.log ("AI LISTS list found", found);
        if (ai_debug) console.log ("AI LISTS list pass", enable_block);
      }

      if (enable_block) {
        var client_list = $(this).attr ("client-list");
        if (typeof client_list != "undefined" && typeof md !== "undefined") {
          var client_list_array  = b64d (client_list).split (",");
          var clients_list_type  = $(this).attr ("client-list-type");

          if (ai_debug) console.log ("AI LISTS client:     ", window.navigator.userAgent);
          if (ai_debug) console.log ("AI LISTS client list:", b64d (client_list), clients_list_type);

          found = false;
          $.each (client_list_array, function (index, list_client) {
            if (list_client == '') return true;

            if (list_client.charAt (0) == "*") {
              if (list_client.charAt (list_client.length - 1) == "*") {
                list_client = list_client.substr (1, list_client.length - 2).toLowerCase ();
                if (user_agent_lc.indexOf (list_client) != - 1) {
                  if (ai_debug) console.log ("AI LISTS FOUND:", list_client);

                  found = true;
                  return false;
                }
              } else {
                  list_client = list_client.substr (1).toLowerCase ();
                  if (user_agent_lc.substr (- list_client.length) == list_client) {
                    if (ai_debug) console.log ("AI LISTS FOUND:", list_client);

                    found = true;
                    return false;
                  }
                }
            }
            else if (list_client.charAt (list_client.length - 1) == "*") {
              list_client = list_client.substr (0, list_client.length - 1).toLowerCase ();
              if (user_agent_lc.indexOf (list_client) == 0) {
                if (ai_debug) console.log ("AI LISTS FOUND:", list_client);

                found = true;
                return false;
              }
            }
            else if (md.is (list_client)) {
              if (ai_debug) console.log ("AI LISTS FOUND:", list_client);

              found = true;
              return false;
            }
          });

          switch (clients_list_type) {
            case "B":
              if (found) enable_block = false;
              break;
            case "W":
              if (!found) enable_block = false;
              break;
          }

          if (ai_debug) console.log ("AI LISTS list found", found);
          if (ai_debug) console.log ("AI LISTS list pass", enable_block);
        }
      }

      var url_parameters_manual_loading = false;
      var url_parameters_no_ai_tcData_yet = false;
      var url_parameters_need_tcData = false;
      if (enable_block) {
        var parameter_list = $(this).attr ("parameter-list");

        if (typeof parameter_list != "undefined") {
          var parameter_list_array = b64d (parameter_list).split (",");
          var parameter_list_type  = $(this).attr ("parameter-list-type");

          if (ai_debug) console.log ('');
          if (ai_debug) console.log ("AI LISTS cookies:       ", cookies);
          if (ai_debug) console.log ("AI LISTS parameter list:", b64d (parameter_list), parameter_list_type);


          var cookie_array = new Array ();
          cookies.forEach (function (cookie) {
            var cookie_data = cookie.split ("=");

            try {
                var cookie_object = JSON.parse (decodeURIComponent (cookie_data [1]));
            } catch (e) {
                var cookie_object = decodeURIComponent (cookie_data [1]);
            }

            cookie_array [cookie_data [0]] = cookie_object;
          });

          if (ai_debug) console.log ("AI LISTS COOKIE ARRAY", cookie_array);

          var list_passed = false;
          var block_div = $(this);
          $.each (parameter_list_array, function (index, list_parameter_term) {

            var parameter_list_array_term = list_parameter_term.split ("&&");
            $.each (parameter_list_array_term, function (index, list_parameter) {

              var result = true;

              list_parameter = list_parameter.trim ();

              var list_parameter_org = list_parameter;

              if (list_parameter.substring (0, 2) == '!!') {
                result = false;
                list_parameter = list_parameter.substring (2);
              }

              if (ai_debug) console.log ("");
              if (ai_debug) console.log ("AI LISTS item check", list_parameter_org);

              var cookie_name   = list_parameter;
              var cookie_value  = '!@!';
              // General check
              var structured_data     = list_parameter.indexOf ('[') != - 1;
              var euconsent_v2_check  = (list_parameter.indexOf ('tcf-v2') == 0 || list_parameter.indexOf ('euconsent-v2') == 0) && list_parameter.indexOf ('[') != - 1;

              if (list_parameter.indexOf ('=') != - 1) {
                var list_parameter_data = list_parameter.split ("=");
                cookie_name  = list_parameter_data [0];
                cookie_value = list_parameter_data [1];
                // Check again only cookie name (no value)
                structured_data     = cookie_name.indexOf ('[') != - 1;
                euconsent_v2_check  = (cookie_name.indexOf ('tcf-v2') == 0 || cookie_name.indexOf ('euconsent-v2') == 0) && cookie_name.indexOf ('[') != - 1;
              }

              if (euconsent_v2_check) {
                // IAB Europe Transparency and Consent Framework (TCF v2)
                if (ai_debug) console.log ("AI LISTS COOKIE tcf-v2");

                $('#ai-iab-tcf-bar').show ();

                if (typeof ai_tcData == 'object') {
                  if (ai_debug) console.log ("AI LISTS COOKIE tcf-v2: ai_tcData set");

                  $('#ai-iab-tcf-bar').addClass ('status-ok');

                  var indexes = cookie_name.replace (/]| /gi, '').split ('[');
                  // Remove cookie name (tcf-v2)
                  indexes.shift ();

                  if (ai_debug) console.log ("AI LISTS COOKIE tcf-v2: tcData", ai_tcData);

                  var structured_data_found = ai_structured_data_item (indexes, ai_tcData, cookie_value);

                  if (ai_debug) console.log ("AI LISTS COOKIE", cookie_value == '!@!' ? cookie_name : cookie_name + '=' + cookie_value, structured_data_found);

                  if (structured_data_found) {
                    list_passed = result;
                  } else list_passed = !result;
                } else {
                    // Mark this list as unprocessed - will be processed later when __tcfapi callback function is called
                    block_div.addClass ('ai-list-data');
                    url_parameters_no_ai_tcData_yet = true;

                    if (typeof __tcfapi == 'function') {
                      // Already available
                      check_and_call__tcfapi (false)
                    } else {
                        if (typeof ai_tcData_retrying == 'undefined') {
                          ai_tcData_retrying  = true;

                          if (ai_debug) console.log ("AI LISTS COOKIE tcf-v2: __tcfapi not found, waiting...");

                          setTimeout (function() {
                            if (ai_debug) console.log ("AI LISTS COOKIE tcf-v2: checking again for __tcfapi");
                            check_and_call__tcfapi (true);
                          }, 200);
                        } else {
                            if (ai_debug) console.log ("AI LISTS COOKIE tcf-v2: __tcfapi still waiting...");
                          }
                    }
                  }
              } else

              if (structured_data) {
                var structured_data_found = ai_structured_data (cookie_array, cookie_name, cookie_value);

                if (ai_debug) console.log ("AI LISTS COOKIE", cookie_value == '!@!' ? cookie_name : cookie_name + '=' + cookie_value, 'found: ', structured_data_found);

                if (structured_data_found) {
                  list_passed = result;
                } else list_passed = !result;
              } else {
                  var cookie_found = false;
                  if (cookie_value == '!@!') {
                    // Check only cookie presence
                    cookies.every (function (cookie) {
                      var cookie_data = cookie.split ("=");

                      if (cookie_data [0] == list_parameter) {
                        cookie_found = true;
                        return false; // exit from cookies.every
                      }

                      return true; // Next loop iteration
                    });
                  } else {
                    // Check cookie with value
                      cookie_found = cookies.indexOf (list_parameter) != - 1;
                    }

                  if (ai_debug) console.log ("AI LISTS COOKIE", list_parameter, 'found: ', cookie_found);

                  if (cookie_found) {
                    list_passed = result;
                  } else list_passed = !result;
                }

              if (!list_passed) {
                if (ai_debug) console.log ("AI LISTS item failed", list_parameter_org);

                return false;  // End && check
              }

            }); // &&

            if (list_passed) {
              return false;  // End list check
            }
          });

          switch (parameter_list_type) {
            case "B":
              if (list_passed) enable_block = false;
              break;
            case "W":
              if (!list_passed) enable_block = false;
              break;
          }

          if ($(this).hasClass ('ai-list-manual')) {
            if (!enable_block) {
              // Manual load AUTO
              url_parameters_manual_loading = true;
              block_div.addClass ('ai-list-data');
            } else {
                block_div.removeClass ('ai-list-data');
                block_div.removeClass ('ai-list-manual');
              }
          }

          if (!url_parameters_manual_loading && !url_parameters_no_ai_tcData_yet) {
            var debug_info = $(this).data ('debug-info');
            if (typeof debug_info != 'undefined') {
              var debug_info_element = $('.' + debug_info);
              if (debug_info_element.length != 0) {
                var debug_bar = debug_info_element.parent ();
                if (debug_bar.hasClass ('ai-debug-info')) {
                  debug_bar.remove ();
                }
              }
            }
          }

          if (ai_debug) console.log ("AI LISTS list passed", list_passed);
          if (ai_debug) console.log ("AI LISTS block enabled", enable_block);
          if (ai_debug) console.log ("");
        }
      }

      // Url parameters needs tcData
      if (!enable_block && url_parameters_need_tcData) {
        if (ai_debug) console.log ("AI LISTS NEED tcData, NO ACTION");
        return true; // Continue ai_list_blocks.each
      }

      var debug_bar = $(this).prevAll ('.ai-debug-bar.ai-debug-lists');
      var referrer_text = referrer == '' ? '#' : referrer;
      debug_bar.find ('.ai-debug-name.ai-list-info').text (referrer_text).attr ('title', user_agent);
      debug_bar.find ('.ai-debug-name.ai-list-status').text (enable_block ? ai_front.visible : ai_front.hidden);

      var scheduling = false;
      if (enable_block) {
        var scheduling_start = $(this).attr ("scheduling-start");
        var scheduling_end   = $(this).attr ("scheduling-end");
        var scheduling_days  = $(this).attr ("scheduling-days");
        if (typeof scheduling_start != "undefined" && typeof scheduling_end != "undefined" && typeof scheduling_days != "undefined") {
          var scheduling = true;

          var scheduling_fallback = parseInt ($(this).attr ("scheduling-fallback"));
          var gmt = parseInt ($(this).attr ("gmt"));
          var scheduling_start_date = ai_get_date (b64d (scheduling_start)) + gmt;
          var scheduling_end_date   = ai_get_date (b64d (scheduling_end)) + gmt;
          var scheduling_days_array = b64d (scheduling_days).split (',');
          var scheduling_type  = $(this).attr ("scheduling-type");

          var current_time = new Date ().getTime () + gmt;
          var date = new Date (current_time);
          var current_day = date.getDay ();
          if (current_day == 0) current_day = 6; else current_day --;

          if (ai_debug) console.log ('');
          if (ai_debug) console.log ("AI SCHEDULING:", b64d (scheduling_start), ' ', b64d (scheduling_end), ' ', b64d (scheduling_days), ' ', scheduling_type == 'W' ? 'IN' : 'OUT');
//          if (ai_debug) console.log ("AI SCHEDULING current time", current_time);
//          if (ai_debug) console.log ("AI SCHEDULING start date", scheduling_start_date, current_time >= scheduling_start_date);
//          if (ai_debug) console.log ("AI SCHEDULING end date  ", scheduling_end_date, current_time < scheduling_end_date);
//          if (ai_debug) console.log ("AI SCHEDULING days", scheduling_days_array, scheduling_days_array.includes (current_day.toString ()));

          var scheduling_ok = current_time >= scheduling_start_date && current_time < scheduling_end_date && scheduling_days_array.includes (current_day.toString ());

          switch (scheduling_type) {
            case "B":
              scheduling_ok = !scheduling_ok;
              break;
          }

          if (!scheduling_ok) {
            enable_block = false;
          }

          var date_time_string = date.toISOString ().split ('.');
          var date_time = date_time_string [0].replace ('T', ' ');

          var debug_bar = $(this).prevAll ('.ai-debug-bar.ai-debug-scheduling');
//          debug_bar.find ('.ai-debug-name.ai-scheduling-info').text (date_time + ' ' + current_day);
          debug_bar.find ('.ai-debug-name.ai-scheduling-info').text (date_time + ' ' + current_day +
          ' current_time:' + current_time.toString () + ' ' +
          ' start_date:' + scheduling_start_date.toString () +
          ' =' + (current_time >= scheduling_start_date).toString () +
          ' end_date:' + scheduling_end_date.toString () +
          ' =:' + (current_time < scheduling_end_date).toString () +
          ' days:' + scheduling_days_array.toString () +
          ' =:' + scheduling_days_array.includes (current_day.toString ()).toString ());

          debug_bar.find ('.ai-debug-name.ai-scheduling-status').text (enable_block ? ai_front.visible : ai_front.hidden);

          if (ai_debug) console.log ("AI SCHEDULING:", date_time + ' ' + current_day);
          if (ai_debug) console.log ("AI SCHEDULING pass", scheduling_ok);
          if (ai_debug) console.log ("AI LISTS list pass", enable_block);

          if (!enable_block && scheduling_fallback != 0) {
            debug_bar.removeClass ('ai-debug-scheduling').addClass ('ai-debug-fallback');
            debug_bar.find ('.ai-debug-name.ai-scheduling-status').text (ai_front.fallback + '=' + scheduling_fallback);

            if (ai_debug) console.log ("AI SCHEDULING fallback block", scheduling_fallback);
          }
        }
      }

      // Cookie list not passed and has manual loading set to Auto
      if (url_parameters_manual_loading) {
        if (ai_debug) console.log ("AI LISTS MANUAL LOADING, NO ACTION");
        return true; // Continue ai_list_blocks.each
      }

      // Cookie list not passed and no ai_tcData yet
      if (url_parameters_no_ai_tcData_yet) {
        if (ai_debug) console.log ("AI LISTS IAB TCF, NO ai_tcData YET");
        return true; // Continue ai_list_blocks.each
      }


      $(this).css ({"visibility": "", "position": "", "width": "", "height": "", "z-index": ""});

//      if (ai_iab_tcf_2_bar) {
//        var debug_bar = $(this).prevAll ('.ai-debug-bar.ai-debug-iab-tcf-2');
//        debug_bar.removeClass ('ai-debug-display-none');
//        debug_bar.find ('.ai-debug-name.ai-cookie-info').text (ai_iab_tcf_2_info);
//        debug_bar.find ('.ai-debug-name.ai-cookie-status').text (ai_iab_tcf_2_status);
//      }


      if (!enable_block) {
        if (scheduling && !scheduling_ok && scheduling_fallback != 0) {
          block_wrapping_div.css ({"visibility": ""});
          if (block_wrapping_div.hasClass ('ai-remove-position')) {
            block_wrapping_div.css ({"position": ""});
          }

          var fallback_div = $(this).next ('.ai-fallback');
          fallback_div.removeClass ('ai-fallback');

          if (typeof $(this).data ('fallback-code') != 'undefined') {
            var block_code = b64d ($(this).data ('fallback-code'));
            $(this).append (block_code);

            if (ai_debug) console.log ('AI INSERT CODE', block_wrapping_div.attr ('class'));
            if (ai_debug) console.log ('');

            ai_process_element (this);
          }  else {
               $(this).hide (); // .ai-list-data
               if (!block_wrapping_div.find ('.ai-debug-block').length) {
                 block_wrapping_div.hide ();
               }
             }

          var tracking_data = block_wrapping_div.attr ('data-ai');
          if (typeof tracking_data !== typeof undefined && tracking_data !== false) {
            var fallback_tracking_data = $(this).attr ('fallback-tracking');
            if (typeof fallback_tracking_data !== typeof undefined && fallback_tracking_data !== false) {
              block_wrapping_div.attr ('data-ai', fallback_tracking_data);
            }
          }
        } else {
            $(this).hide (); // .ai-list-data
            if (!block_wrapping_div.find ('.ai-debug-block').length) {
              block_wrapping_div.hide ();
            }

            block_wrapping_div.removeAttr ('data-ai').removeClass ('ai-track');

            if (block_wrapping_div.find ('.ai-debug-block').length) {
              block_wrapping_div.css ({"visibility": ""}).removeClass ('ai-close');
              if (block_wrapping_div.hasClass ('ai-remove-position')) {
                block_wrapping_div.css ({"position": ""});
              }
            } else block_wrapping_div.hide ();
          }
      } else {
          block_wrapping_div.css ({"visibility": ""});
          if (block_wrapping_div.hasClass ('ai-remove-position')) {
            block_wrapping_div.css ({"position": ""});
          }

          if (typeof $(this).data ('code') != 'undefined') {
            var block_code = b64d ($(this).data ('code'));

            if ($(this).closest ('head').length != 0) {
              $(this).after (block_code);
              if (!ai_debug) $(this).remove ();
            } else $(this).append (block_code);

            if (ai_debug) console.log ('AI INSERT CODE', block_wrapping_div.attr ('class'));
            if (ai_debug) console.log ('');

            ai_process_element (this);
          }
        }

      if (!ai_debug) {
        $(this).attr ('data-code', '');
        $(this).attr ('data-fallback-code', '');
      }

      block_wrapping_div.removeClass ('ai-list-block');
    });
  }

  $(document).ready(function($) {
    setTimeout (function() {
      ai_process_lists ();

      setTimeout (function() {
        ai_install_tcf_callback_useractioncomplete ();
      }, 50);

      if (typeof ai_load_blocks == 'function') {
        jQuery(document).on ("cmplzEnableScripts", ai_cmplzEnableScripts);

        function ai_cmplzEnableScripts (consentData) {
          if (consentData.consentLevel === 'all'){
            ai_load_blocks ();
          }
        }
      }

      jQuery("#ai-iab-tcf-bar").click (function () {
        AiCookies.remove ('euconsent-v2', {path: "/", domain: '.' + window.location.hostname});

        // Clickio GDPR Cookie Consent
        AiCookies.remove ('__lxG__consent__v2',           {path: "/", domain: '.' + window.location.hostname});
        AiCookies.remove ('__lxG__consent__v2_daisybit',  {path: "/", domain: '.' + window.location.hostname});
        AiCookies.remove ('__lxG__consent__v2_gdaisybit', {path: "/", domain: '.' + window.location.hostname});

        AiCookies.remove ('cmplz_marketing',              {path: "/", domain: '.' + window.location.hostname});
        AiCookies.remove ('cmplz_stats',                  {path: "/", domain: '.' + window.location.hostname});
        AiCookies.remove ('complianz_consent_status',     {path: "/", domain: '.' + window.location.hostname});

        jQuery('#ai-iab-tcf-status').text ('COOKIE DELETED');
      });

    }, 5);
  });
});


function ai_process_element (element) {
  setTimeout (function() {
    if (typeof ai_process_rotations_in_element == 'function') {
      ai_process_rotations_in_element (element);
    }

    if (typeof ai_process_lists == 'function') {
      ai_process_lists (jQuery ("div.ai-list-data", element));
    }

    if (typeof ai_process_ip_addresses == 'function') {
      ai_process_ip_addresses (jQuery ("div.ai-ip-data", element));
    }

    if (typeof ai_adb_process_blocks == 'function') {
      ai_adb_process_blocks (element);
    }
  }, 5);
}

function getAllUrlParams (url) {

  // get query string from url (optional) or window
  var queryString = url ? url.split('?')[1] : window.location.search.slice(1);

  // we'll store the parameters here
  var obj = {};

  // if query string exists
  if (queryString) {

    // stuff after # is not part of query string, so get rid of it
    queryString = queryString.split('#')[0];

    // split our query string into its component parts
    var arr = queryString.split('&');

    for (var i=0; i<arr.length; i++) {
      // separate the keys and the values
      var a = arr[i].split('=');

      // in case params look like: list[]=thing1&list[]=thing2
      var paramNum = undefined;
      var paramName = a[0].replace(/\[\d*\]/, function(v) {
        paramNum = v.slice(1,-1);
        return '';
      });

      // set parameter value (use 'true' if empty)
//      var paramValue = typeof(a[1])==='undefined' ? true : a[1];
      var paramValue = typeof(a[1])==='undefined' ? '' : a[1];

      // (optional) keep case consistent
      paramName = paramName.toLowerCase();
      paramValue = paramValue.toLowerCase();

      // if parameter name already exists
      if (obj[paramName]) {
        // convert value to array (if still string)
        if (typeof obj[paramName] === 'string') {
          obj[paramName] = [obj[paramName]];
        }
        // if no array index number specified...
        if (typeof paramNum === 'undefined') {
          // put the value on the end of the array
          obj[paramName].push(paramValue);
        }
        // if array index number specified...
        else {
          // put the value at that index number
          obj[paramName][paramNum] = paramValue;
        }
      }
      // if param name doesn't exist yet, set it
      else {
        obj[paramName] = paramValue;
      }
    }
  }

  return obj;
}

