    <?php
        if(isset($_GET['diagnostics']) && !empty($_GET['diagnostics'])){
            $arrays = $_GET['diagnostics'];
            foreach($arrays as $array){
                echo($array.", ");
            }
        }
    
    ?>
    
    <form method="GET" action="#">
        <ul id="diagnosticTable">

        </ul>
        <input type="submit" value="ANDWWAD">
    </form>
    

    <form>
        <input type="search" name="searcher" id="searcher" placeholder="Buscar Diagnostico">
    </form>




    <table id="table">

    </table>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>

let diag = $('.diag');
let diagnosticTable = $('#diagnosticTable');
let templateDiagnostic = "";

$('#searcher').keyup(function (e) {
    var txt = $(this).val();
    var table = $('#table');

    if(txt.length >= 3){
        $.ajax({
            url:"listCie10.php",
            method:"post",
            data:{search:txt},
            dataType:"text",
            success:function(data){
                let diagnostics = JSON.parse(data);
                let template = "";

                diagnostics.forEach(diagnostic =>{
                    template += "<tr>";
                        template += "<td>";
                            template += `${diagnostic.code}`;
                        template += "</td>";
                        template += "<td>";
                            template += `<p class="diag">${diagnostic.tag}</p>`;
                        template += "</td>";
                    template += "</tr>";
                })
                table.html(template);
                diag = $('.diag');

                diag.click(function(e){
                    templateDiagnostic += `<li>${$(this).text()}<input type='hidden' name='diagnostics[]' value='${$(this).text()}'/></li>`;
                    diagnosticTable.html(templateDiagnostic);
                });
            }
        });
    }else{
        table.html("");
    }

});




</script>


