<html>
<head>
    <script>
        setTimeout('redirect()', 500); //跳转
        function redirect() {
            var status = "{{$status}}";
            if (status == 1) {
                var token = "{{$data['token'] or ''}}";
                window.opener.getToken(token);
                window.close();
            } else if (status == -1) {
                var other_type = "{{$data['other_type'] or ''}}";
                var access_token = "{{$data['access_token'] or ''}}";
                var name = "{{$data['name'] or ''}}";
                window.opener.toBind(other_type, access_token, name);
                window.close();
            }
        }
    </script>
</head>
<body>{{$message}}</body>
</html>