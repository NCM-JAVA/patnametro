@extends('layouts.themes')

@section('content')
@include("../themes.th3.includes.breadcrumb")

@php
$pageurl = clean_single_input(request()->segment(2));
$langid1 = session()->get('locale')??1;
@endphp
<!--**********************************mid part******************-->

<style>

.leading-1 {
    line-height: 1.3;
}
.card img{
	width: 100%;
	height: 200px;
}
.upperbox{
	height: 630px !important;
	margin-bottom: 20px;
}
.lowerbox{
	height: 970px !important;
	margin-bottom: 20px;
}
h6 {font-weight: bold;}
</style>

<div class="row inner_page">
    <div class="sidebar flex-shrink-0 col-md-2 col-xs-12 p-3">
        @include("../themes.th3.includes.sidebar")
    </div>

    <div class="col-lg-10 col-md-9 col-12">
        <h3>Tourist Destination</h3>
        <div class="card-container row">
            <div class="col-md-4 col-12" onclick="openModal('img1', 'text1')">
				<div class="card p-2 upperbox">
                <img src="https://media1.thrillophilia.com/filestore/4g5k2wivvs3awu26lzl21pk79f8y_1628334983_kumhar_park.jpg?w=400&dpr=2"
                    alt="Image 1" class="card-img" id="img1">
                <div class="leading-1 card-text mt-2" id="text1">
                    <h6>Kumhrar
                        (Nearest Metro Station – Zero Mile)</h6>
                    Kumhrar’s Park situated in middle of town is ancient heart of city. Excavations
                    around Patna have uncovered remains of the ancient city of Pataliputra – and
                    the most significant findings were in Kumhrar, where an 80-pillared hall with a
                    wooden platform and a monastery-cum-hospital was discovered. While the hall
                    was initially thought to be a royal durbar, later archaeological findings revealed
                    that it was an assembly hall for Buddhists built during the time of Ashoka. The
                    monastery-cum-hospital in the park, known as Arogya Vihar, dates to the 4th-5th
                    century CE. A small potsherd with ‘Dharvantareh’ inscribed on it was found at
                    the site.
                </div>
				</div>
            </div>

            <div class="col-md-4 col-12" onclick="openModal('img2', 'text2')">
			<div class="card p-2 upperbox">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/91/Golghar_%E0%A5%AA.jpg/800px-Golghar_%E0%A5%AA.jpg"
                    alt="Image 2" class="card-img" id="img2">
                <div class="leading-1 card-text mt-2" id="text2">
                    <h6>-Golghar
                        (Nearest Metro Station – Gandhi Maidan)</h6>
                    Golghar, an enormous granary, was built by Captain John Garstin for British
                    army in 1786, after the terrible impact of 1770 famine. The winding stairway
                    around this monument offers a brilliant view of the city and the Ganga flowing
                    nearby.
                    It is pillar-less with a wall of thickness of 3.6 m at the base height of 29 m.. One
                    can climb at the top of the Golghar through the 145 steps of its spiral stairway
                    around it. The spiral staircase was designed to facilitate the passage of the
                    workers who deliver their load through a hole at the top, and descend the other
                    stairs.
                </div>
				</div>
            </div>
            <div class="col-md-4 col-12" onclick="openModal('img3', 'text3')">
			<div class="card p-2 upperbox">
                <img src="https://upload.wikimedia.org/wikipedia/commons/6/66/Sabhyatadwarpatna.png"
                    alt="Image 2" class="card-img" id="img3">
                <div class="leading-1 card-text mt-2" id="text3">
                    <h6>-Sabhyata Dwar
                        (Nearest Metro Station – Gandhi Maidan)</h6>
                    There are many places to visit in Patna, and the Sabhyata Dwar has been
                    added to that list. It was inaugurated by the Hon'ble Chief Minister Shri Nitish
                    Kumar in the year 2018.
                    Sabhyata Dwar is in the northern part of Gandhi Maidan has unique
                    architecture that is a sure example of a masterpiece. This monument is made of
                    red and sandstone, on top of it you can see a small stupa. This monument
                    mentions many things from history which must be visited to lookout.
                    Sabhyata Dwar attracts the attention of many tourists. People gather here,
                    especially in the evening to relax.
                </div>
				</div>
            </div>
            <div class="col-md-4 col-12" onclick="openModal('img4', 'text4')">
			<div class="card p-2 lowerbox">
                <img src="https://travelsetu.com/apps/uploads/new_destinations_photos/destination/2024/01/06/dfbca55ecfa092d4cb942de1cafc9601_1000x1000.jpg"
                    alt="Image 2" class="card-img" id="img4">
                <div class="leading-1 card-text mt-2" id="text4">
                    <h6>Budha Smriti Park
                        (Nearest Metro Station – Patna Station)
                    </h6>
                    Buddha Smriti Park also known as Buddha Memorial Park (as translated in
                    English) is an urban park located on Frazer Road near Patna Junction in Patna,
                    India.This park has been designed by Vikram Lall and developed by the Bihar
                    Government to commemorate the 2554th birth anniversary of the Buddha. This
                    park was inaugurated by the 14th Dalai Lama.
                    The park has been constructed at the place where once The historical Bankipur
                    Central Jail of British era existed. After a new central jail was built at Beur on the
                    outskirts of Patna, the old jail become redundant. The park is a brainchild of the
                    Chief Minister of Bihar, Nitish Kumar. Tibetan spiritual leader, Dalai Lama, on 27
                    May 2010 inaugurated Buddha Smriti Park and planted two saplings one was
                    brought from Bodh Gaya and the other from Anuradhapura in Sri Lanka of the
                    sacred Bodhi tree. A branch of the original Mahabodhi tree at Bodh Gaya is
                    believed to have been taken to Anuradhapura in Sri Lanka by Emperor Ashoka's
                    son Mahendra.
                    The Sri Lankan delegation had brought a sapling from this tree to planted at the
                    Buddha Smriti Park.The central attraction of this park is the Stupa, known as
                    Patliputra Karuna Stupa, 200 feet high, situated in the middle of the park. This 22
                    acre park located in the heart of city house the pot containing holy ashes of
                    Buddha inside the main stupa.

                </div>
				</div>
            </div>
            <div class="col-md-4 col-12" onclick="openModal('img5', 'text5')">
			<div class="card p-2 lowerbox">
                <img src="https://upload.wikimedia.org/wikipedia/commons/c/c3/Mahavir_Mandir_from_Buddha_Smriti_Park.JPG"
                    alt="Image 2" class="card-img" id="img5">
                <div class="leading-1 card-text mt-2" id="text5">
                    <h6>Mahavir Mandir
                        (Nearest Metro Station – Patna Station)
                    </h6>
                    Mahavir Mandir, located near Patna Junction, is one of the most popular
                    temples dedicated to Lord Hanuman. This famous temple is a symbol of
                    devotion and spirit and every day devotees come here with their wishes, and
                    they believe that Sankat Mochan fulfills their every wish. Many devotees also
                    recite Hanuman Chalisa inside the temple.
                    On the auspicious occasion of Ramnavmi, huge crowds of devotees throng the
                    Mahavir temple, which makes the view even more captivating. Another feature
                    of the temple is its offerings, the naivedyam here is famous all over the country.
                    In the Mahavir temple, many ordinary people are treated at a minimal fee from
                    the income donated by the devotees. Mahaveer Cancer Institute, Mahavir
                    Arogya Sansthan, Mahavir Netralaya, and Mahavir Vatsalya Hospital are being
                    run smoothly by this holy temple in the public interest. Whenever you come to
                    Patna, visit the Mahavir temple.
                </div>
				</div>
            </div>
            <div class="col-md-4 col-12" onclick="openModal('img6', 'text6')">
			<div class="card p-2 lowerbox">
                <img src="https://www.seawatersports.com/img/newimage/places/iskcon-temple-patna.png"
                    alt="Image 2" class="card-img" id="img6">
                <div class="leading-1 card-text" id="text6">
                    <h6>Iskcon Temple
                        (Nearest Metro Station – Vidyut Bhawan)
                    </h6>
                    The ISKCON Temple, Patna, known as Sri Radha Banke Bihari Ji Mandir, is a
                    revered shrine dedicated to Lord Krishna, located at Budh Marg in Patna. This
                    108-foot-tall multi-storey temple is supported by 84 pillars and covers an area of
                    two acres. The foundation stone of the establishment was laid in the year 1984.
                    The current presiding deities in the temple are Sri Sri Gaur Nitai, Sri Sri Radha
                    Banke Bihariji, and Sri Sri Ram Janaki Lakshman and Hanumanji. The walls of the
                    temple are adorned with exquisite styles of carvings and embellishments,
                    showcasing different facets of the life of Shri Krishna.
                    The divine ambiance of the central hall, filled with the melodious tunes of " Hare
                    Krishna & Hare Rama," draws a large number of attendees. The morning aarti is
                    performed at 4:30 am, followed by several devotional lectures and addresses for
                    devotees conducted on a regular basis.
                    A meditation and spiritual center, an auditorium, a restaurant, a guest house,
                    and various other multi-purpose halls are part of the premises.

                </div>
				</div>
            </div>

        </div>

        <!-- Modal -->
        <div id="myModal" class="modal">
            <span class="close" onclick="closeModal()">&times;</span>
            <img class="modal-content" id="modalImg">
            <div id="modalText"></div>
        </div>

    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    function openModal(imgId, textId) {
        var modal = document.getElementById("myModal");
        var modalImg = document.getElementById("modalImg");
        var modalText = document.getElementById("modalText");

        var img = document.getElementById(imgId);
        var text = document.getElementById(textId);

        modal.style.display = "block";
        modalImg.src = img.src;
        modalText.innerHTML = text.innerHTML;
    }

    function closeModal() {
        var modal = document.getElementById("myModal");
        modal.style.display = "none";
    }

    window.openModal = openModal;
    window.closeModal = closeModal;
});
const cards = document.querySelectorAll('.card');
cards.forEach((card, index) => {
    card.style.animationDelay = `${(index + 1) * 0.2}s`;
});
</script>


@endsection