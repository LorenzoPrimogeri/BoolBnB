<!DOCTYPE html>
<html class='use-all-space'>

<head>
    <meta http-equiv='X-UA-Compatible' content='IE=Edge' />
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no' />
    <title>SearchBox</title>
    <link rel='stylesheet' type='text/css'
        href='https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.3-public-preview.0/SearchBox.css' />
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.1.2-public-preview.15/services/services-web.min.js">
    </script>
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.3-public-preview.0/SearchBox-web.js">
    </script>

    <script>
        (function() {
            window.SS = window.SS || {};
            SS.Require = function(callback) {
                if (typeof callback === 'function') {
                    if (window.SS && SS.EventTrack) {
                        callback();
                    } else {
                        var siteSpect = document.getElementById('siteSpectLibraries');
                        var head = document.getElementsByTagName('head')[0];
                        if (siteSpect === null && typeof head !== 'undefined') {
                            siteSpect = document.createElement('script');
                            siteSpect.type = 'text/javascript';
                            siteSpect.src = '/__ssobj/core.js+ssdomvar.js+generic-adapter.js';
                            siteSpect.async = true;
                            siteSpect.id = 'siteSpectLibraries';
                            head.appendChild(siteSpect);
                        }
                        if (window.addEventListener) {
                            siteSpect.addEventListener('load', callback, false);
                        } else {
                            siteSpect.attachEvent('onload', callback, false);
                        }
                    }
                }
            };
        })();
    </script>
</head>

<body>
    <script>
        var options = {
            searchOptions: {
                key: 'NJWytmtgnBFV1Gj4fOdLxqoKVCnhN4c0',
                language: 'it-IT',
                limit: 5
            },
            autocompleteOptions: {
                key: 'NJWytmtgnBFV1Gj4fOdLxqoKVCnhN4c0',
                language: 'it-IT'
            }
        };
        var ttSearchBox = new tt.plugins.SearchBox(tt.services, options);
        var searchBoxHTML = ttSearchBox.getSearchBoxHTML();
        document.body.append(searchBoxHTML);

        ttSearchBox.on('tomtom.searchbox.resultselected', function(data) {
            console.log(data);
        });


        document.getElementById("myText").value = "Johnny Bravo";
    </script>

    <div id="myText"></div>
</body>

</html>
