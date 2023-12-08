


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Application Form</title>
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- Your existing styles and scripts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Roboto+Slab:wght@400;700&display=swap');

html {
  height: 100%;
  min-height:800px;
}
body {
  background: url('https://www.cui.edu/portals/0/assets/academicprograms/education/servant-leadership-institute/servant-leader-feature.jpg');
  background-size:cover;
  background-repeat:no-repeat;
  text-align: center;
 font-family: 'Noto Sans', sans-serif;
  -webkit-touch-callout: none;
  -webkit-user-select: none;
  -khtml-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

h1{
  font-weight:200;
  padding-top:0;
  margin-top:0;
  font-family: 'Roboto Slab', serif;
}

#svg_form_time {
  height: 15px;
  max-width: 80%;
  margin: 40px auto 20px;
  display: block;
}

#svg_form_time circle,
#svg_form_time rect {
  fill: white;
}

.button {
  background: rgb(237, 40, 70);
  border-radius: 5px;
  padding: 15px 25px;
  display: inline-block;
  margin: 10px;
  font-weight: bold;
  color: white;
  cursor: pointer;
  box-shadow:0px 2px 5px rgb(0,0,0,0.5);
}

.disabled {
  display:none;
}

section {
  padding: 30px ;
  max-width: 300px;
  margin: 15px auto;
  background:white;
  background:rgba(255,255,255,0.9);
  backdrop-filter:blur(10px);
  box-shadow:0px 2px 10px rgba(0,0,0,0.3);
  border-radius:5px;
  transition:transform 0.2s ease-in-out;
}


input {
  width: 100%;
  margin: 7px 0px;
  display: inline-block;
  padding: 12px 25px;
  box-sizing: border-box;
  border-radius: 5px;
  border: 1px solid lightgrey;
  font-size: 1em;
  font-family:inherit;
  background:white;
}

p{
  text-align:justify;
margin-top:0;
}
.error {
    border: 1px solid red;
}

.error-message {
    color: red;
    display: block;
    font-size: 12px;
    margin-top: 5px;
}
    </style>
</head>
<body>
  <form action="action/Register.php" method="post" enctype="multipart/form-data">
    <!-- Your existing HTML content -->
    <div id="svg_wrap"></div>

<h1>Inscription</h1>
<section>
    <p>Partie 1</p>
    <input type="text" id="nom" name="nom" placeholder="Nom" />
    <input type="text" id="prenom" name="prenom" placeholder="Prénom" />
    <input type="text" id="cne" name="cne" placeholder="CNE" />
    <input type="text" id="appogee" name="appogee" placeholder="Appogée" />
    <input type="text" id="cin" name="cin" placeholder="CIN" />
</section>

<section>
    <p>Partie 2</p>
    <input type="text" id="adresse_parents" name="adresse_parents" placeholder="Adresse Parents" />
    <input type="text" id="adresse_actuel" name="adresse_actuel" placeholder="Adresse Actuel" />
    <label for="location" class="float-start ms-2">Location :</label>
    <select id="location" name="location" class="form-select">
        <option value="oui">Oui</option>
        <option value="non">Non</option>
    </select>
    <label for="orphelin" class="float-start ms-2">Séjour au Cité Universitaire :</label>
    <select id="cite" name="cite" class="form-select">
        <option value="oui">Oui</option>
        <option value="non">Non</option>
    </select>
    
    <label for="etat_bourse" class="float-start ms-2">Etat de Bourse : </label>
    <select id="etat_bourse" name="etat_bourse" class="form-select">
        <option value="complet">Complet</option>
        <option value="demi">Demi Bourse</option>
        <option value="non">Non Boursé(e)</option>
    </select>
</section>

<section>
    <p>Partie 3</p>
    <input type="text" id="adresse_email" name="adresse_email" data-type="email" placeholder="Adresse Email" />
    <input type="text" id="telephone" name="telephone" data-type="phone" placeholder="Téléphone" />
    <label for="photo" class="float-start ms-3">Photo : </label>
    <input type="file" id="photo" name="photo" placeholder="Photo" />
    
    <label for="orphelin" class="float-start ms-2">Orphelin :</label>
    <select id="orphelin" name="orphelin" class="form-select">
        <option value="oui">Oui</option>
        <option value="non">Non</option>
    </select>
    
    <input type="text" id="nb_membres_famille" name="nb_membres_famille" placeholder="Nombre des membres de la famille" />
</section>

<section>
    <p>General conditions</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
</section>

<div class="button" id="prev">&larr; Previous</div>
<div class="button" id="next">Next &rarr;</div>
<button class="button" id="submit" type="submit">Agree and send application</button>
</form>
<script>
$(document).ready(function () {
    var base_color = "rgb(230,230,230)";
    var active_color = "rgb(237, 40, 70)";

    var child = 1;
    var length = $("section").length - 1;
    $("#prev").addClass("disabled");
    $("#submit").addClass("disabled");

    $("section").not("section:nth-of-type(1)").hide();
    $("section").not("section:nth-of-type(1)").css('transform', 'translateX(100px)');

    var svgWidth = length * 200 + 24;
    $("#svg_wrap").html(
        '<svg version="1.1" id="svg_form_time" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 ' +
        svgWidth +
        ' 24" xml:space="preserve"></svg>'
    );

    function makeSVG(tag, attrs) {
        var el = document.createElementNS("http://www.w3.org/2000/svg", tag);
        for (var k in attrs) el.setAttribute(k, attrs[k]);
        return el;
    }

    for (i = 0; i < length; i++) {
        var positionX = 12 + i * 200;
        var rect = makeSVG("rect", { x: positionX, y: 9, width: 200, height: 6 });
        document.getElementById("svg_form_time").appendChild(rect);

        var circle = makeSVG("circle", {
            cx: positionX,
            cy: 12,
            r: 12,
            width: positionX,
            height: 6
        });
        document.getElementById("svg_form_time").appendChild(circle);
    }

    var circle = makeSVG("circle", {
        cx: positionX + 200,
        cy: 12,
        r: 12,
        width: positionX,
        height: 6
    });
    document.getElementById("svg_form_time").appendChild(circle);

    $('#svg_form_time rect').css('fill', base_color);
    $('#svg_form_time circle').css('fill', base_color);
    $("circle:nth-of-type(1)").css("fill", active_color);

    $(".button").click(function () {
        if (!validateCurrentSection()) {
            // If the current section is not filled, prevent navigation
            return;
        }

        $("#svg_form_time rect").css("fill", active_color);
        $("#svg_form_time circle").css("fill", active_color);
        var id = $(this).attr("id");
        if (id == "next") {
            $("#prev").removeClass("disabled");
            if (child >= length) {
                $(this).addClass("disabled");
                $('#submit').removeClass("disabled");
            }
            if (child <= length) {
                child++;
            }
        } else if (id == "prev") {
            $("#next").removeClass("disabled");
            $('#submit').addClass("disabled");
            if (child <= 2) {
                $(this).addClass("disabled");
            }
            if (child > 1) {
                child--;
            }
        }
        var circle_child = child + 1;
        $("#svg_form_time rect:nth-of-type(n + " + child + ")").css(
            "fill",
            base_color
        );
        $("#svg_form_time circle:nth-of-type(n + " + circle_child + ")").css(
            "fill",
            base_color
        );
        var currentSection = $("section:nth-of-type(" + child + ")");
        currentSection.fadeIn();
        currentSection.css('transform', 'translateX(0)');
        currentSection.prevAll('section').css('transform', 'translateX(-100px)');
        currentSection.nextAll('section').css('transform', 'translateX(100px)');
        $('section').not(currentSection).hide();
    });

    function validateCurrentSection() {
    var currentSection = $("section:nth-of-type(" + child + ")");
    var inputs = currentSection.find("input[type=text], select");

    // Reset styles and remove any existing error messages
    inputs.removeClass("error");
    currentSection.find(".error-message").remove();

    var isValid = true;

    inputs.each(function () {
        var value = $(this).val().trim();

        // Check for empty fields
        if (!value) {
            $(this).addClass("error");
            $("<span class='error-message'>This field is required.</span>").insertAfter($(this));
            isValid = false;
        } else {
            // Check for specific field types
            var fieldType = $(this).attr("data-type");
            switch (fieldType) {
                case "email":
                    // Check for a valid email format
                    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!emailRegex.test(value)) {
                        $(this).addClass("error");
                        $("<span class='error-message'>Please enter a valid email address.</span>").insertAfter($(this));
                        isValid = false;
                    }
                    break;
                case "phone":
                    // Check for a valid phone format
                    var phoneRegex = /^\d{10}$/;
                    if (!phoneRegex.test(value)) {
                        $(this).addClass("error");
                        $("<span class='error-message'>Please enter a valid phone number (10 digits).</span>").insertAfter($(this));
                        isValid = false;
                    }
                    break;
                default:
                    // Check for forbidden characters like < or >
                    var forbiddenCharsRegex = /[<>]/;
                    if (forbiddenCharsRegex.test(value)) {
                        $(this).addClass("error");
                        $("<span class='error-message'>This field contains forbidden characters.</span>").insertAfter($(this));
                        isValid = false;
                    }
                    break;
            }
        }
    });

    return isValid;
}


});

</script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
