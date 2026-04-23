@extends('layout')

@section('content')
    <style>

        body {
            background-color: #f7f4ef;
        }

        .modal-toggle {
            display: none;
        }

        /* brand */
        .brand-container {
            display: inline-block;
            margin: 15px;
            vertical-align: top;
        }

        .brand-box {
            display: block;
            width: 300px;
            height: 200px;
            border: 1px solid #ebebeb;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
            background: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .brand-box img {
            max-width: 80%;
            max-height: 80%;
            object-fit: contain;
        }

        .brand-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .brand-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
            transition: 0.5s;
        }

        .brands-wrapper {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 10px;
            padding: 40px 20px;
            max-width: 1400px;
            margin: 0 auto;
        }

        /* puop up i think */
        .modal-overlay {
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(0,0,0,0.8);
            display: flex; /* Hidden */
            justify-content: center;
            align-items: center;
            z-index: 9999;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.5s ease, visibility 0.5s ease;
        }

        .modal-toggle:checked + .brand-box + .modal-overlay {

            opacity: 1;
            visibility: visible;
        }

        /* isnide th popuop */
        .modal-content {
            background: white;
            padding: 40px;
            border-radius: 12px;
            max-width: 700px;
            width: 90%;
            position: relative;
            max-height: 80vh;
            overflow-y: auto;
        }

        .modal-content h2 {
            text-align: center;
            font-size: 32px;
            text-transform: uppercase;
            margin-bottom: 30px;
            margin-top: 10px;
        }

        .close-btn {
            position: absolute;
            top: 15px; right: 20px;
            font-size: 30px;
            cursor: pointer;
            color: #333;
            line-height: 1;
        }

        .fragrance-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .fragrance-item {
            text-decoration: none;
            color: #333;
            text-align: center;
            transition: 0.2s;
        }

        .fragrance-item:hover {
            transform: scale(1.1);
            transition: 0.5s;
        }

        .fragrance-item img {
            width: 100%;
            height: 150px;
            object-fit: contain;
            margin-bottom: 10px;
        }
    </style>

    <div class="brands-wrapper">
        <!-- cahnel -->
        <div class="brand-container">
            <input type="checkbox" id="brand-chanel" class="modal-toggle">

            <label for="brand-chanel" class="brand-box">
                <img src="images/chanel.png" alt="Chanel Logo">
            </label>

            <div class="modal-overlay">
                <div class="modal-content">
                    <label for="brand-chanel" class="close-btn">&times;</label>
                    <h2>Chanel</h2>

                    <div class="fragrance-grid">
                        <a href="fragrance/bleu-de-chanel" class="fragrance-item">
                            <img src="images/Bleu.jpg" alt="Bleu">
                            <p>Bleu de Chanel</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>


        <!-- deeyor -->
        <div class="brand-container">
            <input type="checkbox" id="brand-dior" class="modal-toggle">

            <label for="brand-dior" class="brand-box">
                <img src="images/dior.png" alt="Dior Logo">
            </label>

            <div class="modal-overlay">
                <div class="modal-content">
                    <label for="brand-dior" class="close-btn">&times;</label>
                    <h2>Christian Dior</h2>

                    <div class="fragrance-grid">
                        <a href="fragrance/sauvage" class="fragrance-item">
                            <img src="images/DiorSa.jpg" alt="Sauvage">
                            <p>Sauvage</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>


        <!-- mfk -->
        <div class="brand-container">
            <input type="checkbox" id="brand-mfk" class="modal-toggle">

            <label for="brand-mfk" class="brand-box">
                <img src="images/mfk.png" alt="MFK Logo">
            </label>

            <div class="modal-overlay">
                <div class="modal-content">
                    <label for="brand-mfk" class="close-btn">&times;</label>
                    <h2>Maison Francis Kurkdjian Paris</h2>

                    <div class="fragrance-grid">
                        <a href="fragrance/baccarat-rouge-540" class="fragrance-item">
                            <img src="images/Bacarat.jpg" alt="Baccarat">
                            <p>Baccarat Rouge 540</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>


        <!-- tomforf -->
        <div class="brand-container">
            <input type="checkbox" id="brand-tom-ford" class="modal-toggle">

            <label for="brand-tom-ford" class="brand-box">
                <img src="images/tomford.png" alt="Tom Ford Logo">
            </label>

            <div class="modal-overlay">
                <div class="modal-content">
                    <label for="brand-tom-ford" class="close-btn">&times;</label>
                    <h2>Tom Ford</h2>

                    <div class="fragrance-grid">
                        <a href="fragrance/black-orchid" class="fragrance-item">
                            <img src="images/BlackOrchid.jpg" alt="Black Orchid">
                            <p>Black Orchid</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>


        <!-- ceekayy -->
        <div class="brand-container">
            <input type="checkbox" id="brand-calvin-klein" class="modal-toggle">

            <label for="brand-calvin-klein" class="brand-box">
                <img src="images/ck.png" alt="Calvin Klein Logo">
            </label>

            <div class="modal-overlay">
                <div class="modal-content">
                    <label for="brand-calvin-klein" class="close-btn">&times;</label>
                    <h2>Calvin Klein</h2>

                    <div class="fragrance-grid">
                        <a href="fragrance/ck-one" class="fragrance-item">
                            <img src="images/CkOne.jpg" alt="CK One">
                            <p>CK One</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>


        <!-- creed -->
        <div class="brand-container">
            <input type="checkbox" id="brand-creed" class="modal-toggle">

            <label for="brand-creed" class="brand-box">
                <img src="images/creed.png" alt="Creed Logo">
            </label>

            <div class="modal-overlay">
                <div class="modal-content">
                    <label for="brand-creed" class="close-btn">&times;</label>
                    <h2>Creed</h2>

                    <div class="fragrance-grid">
                        <a href="fragrance/aventus" class="fragrance-item">
                            <img src="images/CreedAventus.jpg" alt="Aventus">
                            <p>Aventus</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>


        <!-- lncaoncomemcme -->
        <div class="brand-container">
            <input type="checkbox" id="brand-lancome" class="modal-toggle">

            <label for="brand-lancome" class="brand-box">
                <img src="images/lancome.png" alt="Lancome Logo">
            </label>

            <div class="modal-overlay">
                <div class="modal-content">
                    <label for="brand-lancome" class="close-btn">&times;</label>
                    <h2>Lancôme</h2>

                    <div class="fragrance-grid">
                        <a href="fragrance/la-vie-est-belle" class="fragrance-item">
                            <img src="images/Lancome_Paris.jpg" alt="La Vie Est Belle">
                            <p>La Vie Est Belle</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>


        <!-- carolina hererer -->
        <div class="brand-container">
            <input type="checkbox" id="brand-carolinaherrera" class="modal-toggle">

            <label for="brand-carolinaherrera" class="brand-box">
                <img src="images/ch.png" alt="Carolina Herrera Logo">
            </label>

            <div class="modal-overlay">
                <div class="modal-content">
                    <label for="brand-carolinaherrera" class="close-btn">&times;</label>
                    <h2>Carolina Herrera</h2>

                    <div class="fragrance-grid">
                        <a href="fragrance/good-girl" class="fragrance-item">
                            <img src="images/GoodGirl.jpg" alt="Good Girl">
                            <p>Good Girl</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>


        <!-- le labo -->
        <div class="brand-container">
            <input type="checkbox" id="brand-le-labo" class="modal-toggle">

            <label for="brand-le-labo" class="brand-box">
                <img src="images/lelabo.png" alt="Le Labo Logo">
            </label>

            <div class="modal-overlay">
                <div class="modal-content">
                    <label for="brand-le-labo" class="close-btn">&times;</label>
                    <h2>Le Labo</h2>

                    <div class="fragrance-grid">
                        <a href="fragrance/santal-33" class="fragrance-item">
                            <img src="images/LeLaboSan.jpg" alt="Santal-33">
                            <p>Santal-33</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>


        <!-- ysl -->
        <div class="brand-container">
            <input type="checkbox" id="brand-ysl" class="modal-toggle">

            <label for="brand-ysl" class="brand-box">
                <img src="images/ysl.png" alt="Yves Saint Laurent Logo">
            </label>

            <div class="modal-overlay">
                <div class="modal-content">
                    <label for="brand-ysl" class="close-btn">&times;</label>
                    <h2>Yves Saint Laurent</h2>

                    <div class="fragrance-grid">
                        <a href="fragrance/libre" class="fragrance-item">
                            <img src="images/YSL_LIBRE.jpg" alt="Libre">
                            <p>Libre</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>



        <!-- versecea -->
        <div class="brand-container">
            <input type="checkbox" id="brand-versace" class="modal-toggle">

            <label for="brand-versace" class="brand-box">
                <img src="images/versace.png" alt="Versace Logo">
            </label>

            <div class="modal-overlay">
                <div class="modal-content">
                    <label for="brand-versace" class="close-btn">&times;</label>
                    <h2>Versace</h2>

                    <div class="fragrance-grid">
                        <a href="fragrance/eros" class="fragrance-item">
                            <img src="images/Eros.jpg" alt="Eros">
                            <p>Eros</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>


        <!-- mug -->
        <div class="brand-container">
            <input type="checkbox" id="brand-mugler" class="modal-toggle">

            <label for="brand-mugler" class="brand-box">
                <img src="images/mugler.png" alt="Mugler Logo">
            </label>

            <div class="modal-overlay">
                <div class="modal-content">
                    <label for="brand-mugler" class="close-btn">&times;</label>
                    <h2>Mugler</h2>

                    <div class="fragrance-grid">
                        <a href="fragrance/alien" class="fragrance-item">
                            <img src="images/Alien.jpg" alt="Alien">
                            <p>Alien</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>


        <!-- jomalwoeen -->
        <div class="brand-container">
            <input type="checkbox" id="brand-jo-malone" class="modal-toggle">

            <label for="brand-jo-malone" class="brand-box">
                <img src="images/jo.png" alt="Jo Malone Logo">
            </label>

            <div class="modal-overlay">
                <div class="modal-content">
                    <label for="brand-jo-malone" class="close-btn">&times;</label>
                    <h2>Jo Malone</h2>

                    <div class="fragrance-grid">
                        <a href="fragrance/wood-sage-sea-salt" class="fragrance-item">
                            <img src="images/JoMalonWoodSage.jpg" alt="Wood Sage & Sea Salt">
                            <p>Wood Sage & Sea Salt</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>


        <!-- escentric -->
        <div class="brand-container">
            <input type="checkbox" id="brand-escentric-molecules" class="modal-toggle">

            <label for="brand-escentric-molecules" class="brand-box">
                <img src="images/em.png" alt="Escentric Molecules Logo">
            </label>

            <div class="modal-overlay">
                <div class="modal-content">
                    <label for="brand-escentric-molecules" class="close-btn">&times;</label>
                    <h2>Escentric Molecules</h2>

                    <div class="fragrance-grid">
                        <a href="fragrance/molecule-01" class="fragrance-item">
                            <img src="images/Molecule.jpg" alt="Molecule 01">
                            <p>Molecule 01</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>



        <!-- byredo -->
        <div class="brand-container">
            <input type="checkbox" id="brand-byredo" class="modal-toggle">

            <label for="brand-byredo" class="brand-box">
                <img src="images/byredo.png" alt="Byredo Logo">
            </label>

            <div class="modal-overlay">
                <div class="modal-content">
                    <label for="brand-byredo" class="close-btn">&times;</label>
                    <h2>Byredo</h2>

                    <div class="fragrance-grid">
                        <a href="fragrance/gypsy-water" class="fragrance-item">
                            <img src="images/gypsy.jpg" alt="Gypsy Water">
                            <p>Gypsy Water</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
