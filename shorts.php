<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <style>
    #swipeArea {
      width: 100%;
      height: 600px;
      background-color: lightgray;
    }
  </style>
</head>
<body>
  <div id="swipeArea"></div>

  <script>
    var startX, startY, distX, distY;
    var swipeThreshold = 50; // Minimum distance to consider as a swipe gesture

    var swipeArea = document.getElementById('swipeArea');

    swipeArea.addEventListener('mousedown', handleMouseDown, false);
    swipeArea.addEventListener('mousemove', handleMouseMove, false);
    swipeArea.addEventListener('mouseup', handleMouseUp, false);

    swipeArea.addEventListener('touchstart', handleTouchStart, false);
    swipeArea.addEventListener('touchmove', handleTouchMove, { passive: false }); // Add { passive: false } to prevent default
    swipeArea.addEventListener('touchend', handleTouchEnd, false);

    function handleMouseDown(event) {
      startX = event.clientX;
      startY = event.clientY;

      swipeArea.addEventListener('mousemove', handleMouseMoveDuringSwipe, false);
    }

    function handleMouseMove(event) {
      event.preventDefault(); // Prevent selection
    }

    function handleMouseMoveDuringSwipe(event) {
      event.preventDefault(); // Prevent selection

      distX = event.clientX - startX;
      distY = event.clientY - startY;
    }

    function handleMouseUp(event) {
      swipeArea.removeEventListener('mousemove', handleMouseMoveDuringSwipe, false);
      handleSwipe();
      resetValues();
    }

    function handleTouchStart(event) {
      var touch = event.touches[0];
      startX = touch.clientX;
      startY = touch.clientY;
    }

    function handleTouchMove(event) {
      event.preventDefault(); // Prevent scrolling and refresh

      var touch = event.touches[0];
      distX = touch.clientX - startX;
      distY = touch.clientY - startY;
    }

    function handleTouchEnd(event) {
      handleSwipe();
      resetValues();
    }

    function handleSwipe() {
      if (Math.abs(distX) > Math.abs(distY) && Math.abs(distX) > swipeThreshold) {
        // Horizontal swipe detected
        if (distX > 0) {
          // Swipe right
          alert('Swipe right');
        } else {
          // Swipe left
          alert('Swipe left');
        }
      } else if (Math.abs(distY) > Math.abs(distX) && Math.abs(distY) > swipeThreshold) {
        // Vertical swipe detected
        if (distY > 0) {
          // Swipe down
          alert('Swipe down');
        } else {
          // Swipe up
          alert('Swipe up');
        }
      } else {
        // Click + move event
       // alert('Click + move');
      }
    }

    function resetValues() {
      startX = 0;
      startY = 0;
      distX = 0;
      distY = 0;
    }
  </script>
</body>
</html>

<?php



die;

function isMobileDevice()
{
    $userAgent = $_SERVER['HTTP_USER_AGENT'];

    $mobileKeywords = ['Mobile', 'Android', 'iPhone', 'iPad', 'Windows Phone'];

    foreach ($mobileKeywords as $keyword) {
        if (strpos($userAgent, $keyword) !== false) {
            return true;
        }
    }

    return false;
}

if (isMobileDevice()) {
    // User is using a mobile device or tablet
    // Perform mobile-specific actions
} else {
    // User is using a desktop device
    // Perform desktop-specific actions
}
?>

<script>
function displayScreenResolution() {
  var screenWidth = window.screen.width;
  var screenHeight = window.screen.height;
  
  // Display an alert on the page
  alert('Screen resolution: ' + screenWidth + 'x' + screenHeight);
}

displayScreenResolution();
</script>
