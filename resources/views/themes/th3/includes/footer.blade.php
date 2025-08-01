<!-- ----------------------Footer Start-------------------------- -->
<footer class="site-footer">
    <div class="border-bottom">
    <div class="container quick-links d-flex justify-content-between flex-column flex-md-row">
        <?php   $pos=[3,4];
            $langid=session()->get('locale')??1;
            $res= get_menu($langid,$pos,0) ; $i=1; 
            $pageurl = clean_single_input(request()->segment(2));
            ?>
        @foreach($res as $mod)
        @if($mod->m_type==2)
        <a class="px-2" target="_blank" href="{{ url('/public/upload/admin/cmsfiles/menus/') }}/{{$mod->doc_uplode}}"
            title="{{$mod->m_name}}"> {{$mod->m_name}}</a>
        @elseif($mod->m_type==3)
        <a class="px-2" target="_blank" href="{{$mod->linkstatus}}" title="{{$mod->m_name}}"> {{$mod->m_name}}</a>

        @else
        <a class="px-2" href="@if($mod->m_url=='#') '' @else {{ url('/pages') }}/{{$mod->m_url}} @endif"
            title="{{$mod->m_name}}"> {{$mod->m_name}}</a>

        @endif
        <?php $i++ ; ?>
        @endforeach
    </div>
    </div>
    <div class="footer-content container px-0 py-3">

        <div class="footer-left">
            <!-- Patna Metro Rail Corporation Limited,7th Floor, Indra Bhavan, West Boring Canal Road, Patna, Bihar, 800001. -->
            <p>Patna Metro Rail Corporation Limited,</p>
            <p>Indra Bhavan, West Boring Canal Road,</p>
            <p>Patna, Bihar, 800001</p>
        </div>
        <div class="footer-center">
            <a href="#" class="social-icon"><i class="fa-brands fa-facebook"></i></a>
            <a href="https://x.com/dmrcpatna?lang=en" class="social-icon"> <svg fill="white" class="svgIcon"
                    xmlns="http://www.w3.org/2000/svg" width="25px" height="25px" viewBox="0 0 564 564">
                    <path
                        d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z">
                    </path>
                </svg></a>
            <!-- <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a> -->
            <a href="#" class="social-icon"><i class="fa-brands fa-youtube"></i></a>
            <a href="#" class="social-icon"><i class="fa-brands fa-instagram"></i></a>
        </div>
        <div class="footer-right">
            <p><i class="fas fa-envelope"></i> mail[dot]pmrcl[at]gmail[dot]com</p>
            <!-- <p class="time">09.30 am - 5.00 pm</p>
            <p><i class="fas fa-phone"></i> 1800 425 0355</p> -->
            <p class="">Toll Free No.-</p>
        </div>
    </div>
    <div class="footer-bottom bg-dark py-1">
        <p>&copy;Patna Metro Rail Corporation, All Rights Reserved </p>
    </div>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ URL::asset('/public/themes/th3/assets/JS/main.js')}}"></script>
<script src="{{ URL::asset('/public/themes/th3/assets/JS/font-size-new.js')}}"></script>
<script src="{{ URL::asset('/public/themes/th3/assets/JS/styleswitcher.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="{{ URL::asset('/public/themes/th3/assets/bootstrap-5.0.2-dist/js/bootstrap.min.js')}}"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js" integrity="sha512-EKWWs1ZcA2ZY9lbLISPz8aGR2+L7JVYqBAYTq5AXgBkSjRSuQEGqWx8R1zAX16KdXPaCjOCaKE8MCpU0wcHlHA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>   -->
<script src="{{ URL::asset('/public/themes/th3/JS/clientside.validation.js')}}"></script>
<script>
function sitevisit() {
    var ret_val = confirm("This is an external link. Do you wish to open in new window.");
    if (ret_val == true) {
        return true;
    } else {
        return false;
    }
}

function change_language(data) {
    //alert(data.value);
    if (data.value == 1) {
        var ret_val = confirm("Switch To English");
        return true;
    } else {
        var ret_val = confirm("Switch To Hindi");
        return false;
    }
}

function myFunction() {
    window.print();
}
</script>
<script type="text/javascript">
var url = "{{ route('changeLang') }}";

$(".changeLang").change(function() {
    window.location.href = url + "?lang=" + $(this).val() ?? 1;
});
</script>
<script>
const modal = document.getElementById("myModal");
const modalImg = document.getElementById("img01");
let images = [];
let currentImageIndex = 0;

function openModal(imageSrc, categoryImages) {
    modal.style.display = "block";
    setTimeout(() => {
        modal.classList.add("show");
        modalImg.src = imageSrc;
        images = categoryImages;
        currentImageIndex = categoryImages.indexOf(imageSrc);
    }, 10);
}

function closeModal() {
    modal.classList.remove("show");
    setTimeout(() => {
        modal.style.display = "none";
    }, 500);
}

function nextSlide() {
    if (images.length === 0) return;
    currentImageIndex = (currentImageIndex + 1) % images.length;
    modalImg.src = images[currentImageIndex];
}

// Close the modal if the user clicks outside of it
window.onclick = function(event) {
    if (event.target == modal) {
        closeModal();
    }
};
</script>
</body>

</html>