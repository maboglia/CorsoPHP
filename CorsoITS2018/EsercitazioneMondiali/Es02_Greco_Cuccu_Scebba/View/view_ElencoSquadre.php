<div class="container">

<form method="post" action="Controller/controller.php">
<ul class="collection">
    <li class="collection-item"><label><div><input class="classifica" id="squadre" name="squadra1" type="checkbox" /><span><span class="badge" id="badgeDisplayed" style="display:none"></span>Francia</span></div></label></li>
    <li class="collection-item"><label><input class="classifica" id="squadre" name="squadra2" type="checkbox" /><span><span class="badge" id="badgeDisplayed" style="display:none"></span>Argentina</span></label></li>
    <li class="collection-item"><label><input class="classifica" id="squadre" name="squadra3" type="checkbox" /><span><span class="badge" id="badgeDisplayed" style="display:none"></span>Uruguay</span></label></li>
    <li class="collection-item"><label><input class="classifica" id="squadre" name="squadra4" type="checkbox" /><span><span class="badge" id="badgeDisplayed" style="display:none"></span>Portogallo</span></label></li>
    <li class="collection-item"><label><input class="classifica" id="squadre" name="squadra5" type="checkbox" /><span><span class="badge" id="badgeDisplayed" style="display:none"></span>Spagna</span></label></li>
    <li class="collection-item"><label><input class="classifica" id="squadre" name="squadra6" type="checkbox" /><span><span class="badge" id="badgeDisplayed" style="display:none"></span>Russia</span></label></li>
    <li class="collection-item"><label><input class="classifica" id="squadre" name="squadra7" type="checkbox" /><span><span class="badge" id="badgeDisplayed" style="display:none"></span>Croazia</span></label></li>
    <li class="collection-item"><label><input class="classifica" id="squadre" name="squadra8" type="checkbox" /><span><span class="badge" id="badgeDisplayed" style="display:none"></span>Danimarca</span></label></li>
</ul>

<button class="btn waves-effect waves-light" type="submit" name="action">Vota
    <i class="material-icons right">send</i>
</button>
</form>

</div>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
    var contatore = 0;

    $(".classifica:input:checkbox").change(function () {
            if($(this).is(":checked")){
                contatore++;
                $(this).parent().children("span").children("span").css("display", "block");

                if(contatore > 4){
                    $(this).prop("checked", false);
                    contatore--;
                    $(this).parent().children("span").children("span").css("display", "none");
                }

                $(this).parent().children("span").children("span").text(contatore);
            }
            else{
                contatore--;
                $(this).parent().children("span").children("span").css("display", "none");

            }
    })
</script>