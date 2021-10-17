    <!-- Js Plugins -->
    <script src="{{asset('template/aesthetic/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('template/aesthetic/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('template/aesthetic/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('template/aesthetic/js/masonry.pkgd.min.js')}}"></script>
    <script src="{{asset('template/aesthetic/js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('template/aesthetic/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('template/aesthetic/js/jquery.slicknav.js')}}"></script>
    <script src="{{asset('template/aesthetic/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('template/aesthetic/js/main.js')}}"></script>
    <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
    <script>
        function getDateTime() {
        var now     = new Date(); 
        var year    = now.getFullYear();
        var month   = now.getMonth()+1; 
        var day     = now.getDate();
        var hour    = now.getHours();
        var minute  = now.getMinutes();
        var second  = now.getSeconds(); 
        if(month.toString().length == 1) {
             month = '0'+month;
        }
        if(day.toString().length == 1) {
             day = '0'+day;
        }   
        if(hour.toString().length == 1) {
             hour = '0'+hour;
        }
        if(minute.toString().length == 1) {
             minute = '0'+minute;
        }
        if(second.toString().length == 1) {
             second = '0'+second;
        }   
        var dateTime = day+'/'+month+'/'+year+' '+hour+':'+minute+':'+second;   
         return dateTime;
    }

    // example usage: realtime clock
    setInterval(function(){
        currentTime = getDateTime();
        document.getElementById("digital-clock").innerHTML = currentTime;
    }, 1000);
        
    </script>
    @stack('scripts')