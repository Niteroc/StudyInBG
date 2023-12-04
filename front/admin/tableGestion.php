<?php
function displayTableGestion($post, $type)
{

    $html = <<<HTML
        <div id="divTable" >
        <table class="table table-striped" name="tableAdmin">
                <thead>
                    <tr>
HTML;
    $id = array_keys($post[0])[0];
    $object = substr($id, 2);
    foreach (array_keys($post[0]) as $colonne) {
        $html .= <<<HTML
                        <th> $colonne </th>
HTML;
    }

    if ($type == 'Element') {
        $html .= <<<HTML
                        <th> Valider ✓ <br> Invalider ✖ </th>
HTML;
    }
    $html .= <<<HTML
                        <th> Supprimer </th>
                    </tr>
                </thead>
                <tbody>  
HTML;

    foreach ($post as $line) {

        $html .= <<<HTML
                    <tr>
 HTML;

        foreach ($line as $key => $dataLine) {

            $id = key($post[0]);

            if ($key == 'image') $dataLine = "<img class='img_wine' src=data:image/png;base64," . base64_encode($dataLine) . ">";

            if (!preg_match('/^id[A-Z]/', $key)) {
                $html .= <<<HTML
                        <td > <label class="edit $object+$line[$id]">$dataLine</label> </td>
HTML;
            } else {
                $html .= <<<HTML
                        <td> $dataLine </td>
HTML;
            }
        }
        if ($type == 'Element' && $line['valide'] == 0) {
            $html .= <<<HTML
                        <td >
                            <input tablename="$type" id="$line[$id]" class="valid" type="button" value="✓" />
                        </td>
HTML;
        } else if($type == 'Element' && $line['valide'] == 1) {
            $html .= <<<HTML
                        <td >
                            <input tablename="$type" id="$line[$id]" class="invalid" type="button" value="✖" />
                        </td>
HTML;
        }
        $html .= <<<HTML
                        <td >
                            <input tablename="$type" id="$line[$id]" class="close" type="button" value="✖" />
                        </td>
                    </tr>
HTML;
    }
    $html .= <<<HTML
        </tbody>
    </table>
    </div>
<script src="front/assets/js/jquery.min.js"></script>
<script src="front/assets/js/panelAdmin.js" ></script>
HTML;

    echo $html;

}