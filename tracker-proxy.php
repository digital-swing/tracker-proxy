<?php
   /*
   Plugin Name: Tracker Proxy
   Plugin URI: https://www.digital-swing.com
   description: Call Matomo tracking code without showing its URL
   Version: 0.1
   Author: Digital Swing
   Author URI: https://www.digital-swing.com
   License: GPL2
   */

  function matomo_analytics_tracking_code()
  {
      if(defined('MATOMO_PROXY_URL') ) { ?> 
        <!-- Matomo -->
        <script>
        var _paq = window._paq = window._paq || [];
        /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
        _paq.push(['trackPageView']);
        _paq.push(['enableLinkTracking']);
        (function() {
            var u="<?php echo MATOMO_PROXY_URL; ?>";
            _paq.push(['setTrackerUrl', u+'/matomo.php']);
            _paq.push(['setSiteId', '2']);
            var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
            g.type="text/javascript"; g.async=true; g.defer=true; g.src=u+'/matomo.php'; s.parentNode.insertBefore(g,s);
        })();
        </script>
        <!-- End Matomo Code -->
      <?php }
  }
  
  \add_action('wp_enqueue_scripts', 'matomo_analytics_tracking_code');
?>