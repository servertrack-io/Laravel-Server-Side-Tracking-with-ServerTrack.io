<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- ServerTrack Init Code -->
    <script>
        (function(w, d, u, k) {
            w.ServerTrack = w.ServerTrack || {};
            w.serverTrackQueue = [];
            w.st = function() { w.serverTrackQueue.push(arguments); };
            var s = d.createElement('script'); 
            s.async = 1; 
            var randomPath = Math.random().toString(36).substring(2, 15);
            s.src = u + '/lib/' + randomPath + '?key=' + k; 
            var h = d.getElementsByTagName('script')[0]; 
            h.parentNode.insertBefore(s, h);
        })(window, document, 'some.website.com', 'AUTHENTICATION_KEY');
    </script>

</head>

<body>
    @yield('content')
    @stack('scripts')
</body>
</html>



