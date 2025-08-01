<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> {{ $title ??''}}</title> 
        <link rel="icon" href="{{ url('/public/themes/th3/assets/images/logo.jpg') }}" />

    
        <link rel="stylesheet" href="{{ URL::asset('/public/themes/th3/assets/CSS/Comman.css')}}">
        <link rel="stylesheet" href="{{ URL::asset('/public/themes/th3/assets/CSS/blue.css')}}">
        <link href="{{ URL::asset('/public/themes/th3/assets/CSS/outrageous_orange.css')}}" rel="alternate stylesheet" media="screen" title="outrageous_orange">
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"> -->
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css" integrity="sha512-6lLUdeQ5uheMFbWm3CP271l14RsX1xtx+J5x2yeIDkkiBpeVTNhTqijME7GgRKKi6hCqovwCoBTlRBEC20M8Mg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="{{ URL::asset('/public/themes/th3/assets/bootstrap-5.0.2-dist/css/bootstrap.min.css')}}">
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Poppins:wght@400;600&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    
<!-- ----------------------font size script Start-------------------------- -->
<script type="text/javascript">
       $(document).ready(function () {
        var maxFontSizeChange = 3; // Set the maximum font size change allowed

        $('#fontincrease').click(function () {
            modifyFontSize('increase');
        });
        $('#fontdecrease').click(function () {
            modifyFontSize('decrease');
        });
        $('#fontreset').click(function () {
            modifyFontSize('reset');
        });

        function modifyFontSize(flag) {
            var divElement = $('body');
            var currentFontSize = parseInt(divElement.css('font-size'));

            if (flag == 'increase') {
                currentFontSize += 3;
                if (currentFontSize > 22) { // Limit to a maximum of 24px
                    currentFontSize = 22;
                }
            } else if (flag == 'decrease') {
                currentFontSize -= 3;
                if (currentFontSize < 11) { // Limit to a minimum of 12px
                    currentFontSize = 11;
                }
            } else {
                currentFontSize = 16; // Reset to the default font size
            }

            divElement.css('font-size', currentFontSize + 'px');
        }
    });
</script>
<script>
// Function to prevent back navigation
function preventBackNavigation() {
    // Push a new state to the history stack
    window.history.pushState(null, null, window.location.href);

    // Listen for the popstate event
    window.onpopstate = function (event) {
        // Check if the event state is null, indicating a back navigation attempt
        if (!event.state) {
            // Prevent default behavior and push another state
            event.preventDefault();
            window.history.pushState(null, null, window.location.href);
        }
    };
}

// Call the function to prevent back navigation when the page loads
window.onload = preventBackNavigation;
</script>

    </head>