<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="logo me-auto">
      <a href="../index.php"><img src="../assets/img/greenlife.png" alt="" class="img-fluid"></a>
    </div>
    <center>
</br></br></br></br></br>
    <h3 class="card-title">Iniciar Sesión</h3> 
    </br>                  
    <form action="../index.php" method="post" id='formulario'>
                            
        <label for="user" class="user">Usuario: </label>
        <input type="text" class="form-control" id="user" name="user" placeholder="Nombre de usuario"/>
        </br>
        <label for="pass" class="">Contraseña: </label>
        <input type="password" class="form-control" id="pass" name="pass" placeholder="Contraseña"/>
        </br>        
        <input type="submit" class="btn btn-success" value="Iniciar Sesión" id="iniciar-sesion" name="iniciar-sesion" />
        <input type="reset" class="btn btn-danger"  value="Cancelar" id="cancelar" name="cancelar" />
     
    </form>
    </center>
    <script src="assets/js/index.js"></script>
<!-- Code injected by live-server -->
<script>
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script>
</body>
</html>