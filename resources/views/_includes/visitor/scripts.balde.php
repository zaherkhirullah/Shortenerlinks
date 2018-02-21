<script src="{{ asset('styles/home/js/jquery.min.js') }}"></script>
<script src="{{ asset('styles/home/js/bootstrap.min.js') }}"></script>
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
				(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
				m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
			ga('create', 'UA-24098524-7', 'auto');
			ga('require', 'linkid', 'linkid.js');
			ga('send', 'pageview');
		</script>
		<script type='text/javascript'>
			var adParams = {p: '70728218', text: 'Skip the captcha and Get to the shorten URL.', btnText: 'Ok', barColor: '#fbecad', btnBgColor: '#FFFFFF',direction: 'LTR',position :'top',popOnClose:'true'  , serverdomain: 'wmedia'  ,addPuzzleImage:true };
		</script>
		<script type='text/javascript' src='https://wmedia.adk2.co/wmedia/tags/xnotificationbar/xnotificationbar.js?ap=1317'>
		</script>

<script src='https://cdnjs.cloudflare.com/ajax/libs/fuckadblock/3.2.1/fuckadblock.min.js'>
</script>
<script src='https://cdn.jsdelivr.net/npm/fuckadblock@3.2.1/fuckadblock.min.js'>
</script>
<script>
	// Function called if AdBlock is not detected
function adBlockNotDetected() {
	var msg = document.getElementById('msg-adblock');
	alert('AdBlock is not enabled');
	msg.text() ='AdBlock is not enabled';
}
// Function called if AdBlock is detected
function adBlockDetected() {
	var msg = document.getElementById('msg-adblock');
	alert('AdBlock is enabled');
	msg.text() ='AdBlock is enabled';
}

// We look at whether FuckAdBlock already exists.
if(typeof fuckAdBlock !== 'undefined' || typeof FuckAdBlock !== 'undefined') {
	adBlockDetected();
}
 else {
	// Otherwise, you import the script FuckAdBlock
	var importFAB = document.createElement('script');
	importFAB.onload = function() {
		// If all goes well, we configure FuckAdBlock
		fuckAdBlock.onDetected(adBlockDetected)
		fuckAdBlock.onNotDetected(adBlockNotDetected);
	};
	importFAB.onerror = function() {
		// If the script does not load (blocked, integrity error, ...)
		// Then a detection is triggered
		adBlockDetected(); 
	};
	importFAB.integrity = 'sha256-xjwKUY/NgkPjZZBOtOxRYtK20GaqTwUCf7WYCJ1z69w=';
	importFAB.crossOrigin = 'anonymous';
	importFAB.src = 'https://cdnjs.cloudflare.com/ajax/libs/fuckadblock/3.2.1/fuckadblock.min.js';
	document.head.appendChild(importFAB);
}
</script>