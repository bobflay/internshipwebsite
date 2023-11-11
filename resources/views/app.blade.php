<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XpertBot APP</title>

</head>
<body>
    <script>
    function redirectToAppStore() {
        var userAgent = navigator.userAgent || navigator.vendor || window.opera;
        if (/android/i.test(userAgent)) {
        // Redirect Android users to the Google Play Store.
        window.location.href = '/android';
        } else if (/iPad|iPhone|iPod/i.test(userAgent)) {
        // Redirect iOS users to the App Store.
        window.location.href = '/ios';
        } else {
        // Redirect other users to a web page.
        window.location.href = 'https://xpertbotacademy.online';
        }
    }

    // Call the function when the page loads.
    redirectToAppStore();
    </script>

</body>
</html>