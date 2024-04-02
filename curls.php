<?php
    extract($_POST);
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://www.dnd5eapi.co/api/monsters",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
    ));
    $response = curl_exec($curl) ;
    curl_close($curl);
    $monsters = json_decode($response);
    
    if(isset($monsterData)){
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://www.dnd5eapi.co/api/monsters/".$monsterData."",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ));
        $response = curl_exec($curl) ;
        curl_close($curl);
        $monster = json_decode($response);

        echo '<div id="div-nome">';
        echo '<h1 class="info">'.$monster->name.'</h1>';
        if(isset($monster->desc)){echo '<div class="info">'.$monster->desc.'</div>';}else{echo '<div class="info">No description available</div></div>';}
        echo '</div><div id="div-line2"><div id="div1">';
        if(isset($monster->charisma)){echo '<div class="info">Cha: '.$monster->charisma.'</div>';}else{echo '<div class="info">No charisma available</div>';}
        if(isset($monster->constitution)){echo '<div class="info">Con: '.$monster->constitution.'</div>';}else{echo '<div class="info">No constitution available</div>';}
        if(isset($monster->dexterity)){echo '<div class="info">Dex: '.$monster->dexterity.'</div>';}else{echo '<div class="info">No dexterity available</div>';}
        if(isset($monster->intelligence)){echo '<div class="info">Int: '.$monster->intelligence.'</div>';}else{echo '<div class="info">No intelligence available</div>';}
        if(isset($monster->strength)){echo '<div class="info">Str: '.$monster->strength.'</div>';}else{echo '<div class="info">No strength available</div>';}
        if(isset($monster->wisdom)){echo '<div class="info">Wis: '.$monster->wisdom.'</div>';}else{echo '<div class="info">No wisdom available</div>';}
        echo '</div><div id="div2">';
        if(isset($monster->size)){echo '<div class="info">Size: '.$monster->size.'</div>';}else{echo '<div class="info">No size available</div>';}
        if(isset($monster->type)){echo '<div class="info">Type: '.$monster->type.'</div>';}else{echo '<div class="info">No type available</div>';}
        if(isset($monster->subtype)){echo '<div class="info">Subtype: '.$monster->subtype.'</div>';}else{echo '<div class="info">No subtype available</div>';}
        if(isset($monster->alignments)){echo '<div class="info">Alignments: '.$monster->alignments.'</div>';}else{echo '<div class="info">No alignments available</div>';}
        if(isset($monster->challenge_rating)){echo '<div>Challenge rating: '.$monster->challenge_rating.'</div>';}else{echo '<div>No challenge rating available</div>';}
        if(isset($monster->xp)){echo '<div>XP: '.$monster->xp.'</div>';}else{echo '<div>No xp available</div>';}        
        echo '</div><div id="div3">';
        if(isset($monster->speed)){
            isset($monster->speed->walk) ? $walk = $monster->speed->walk: $walk = '0 ft';
            isset($monster->speed->burrow) ? $burrow = $monster->speed->burrow: $burrow = '0 ft';
            isset($monster->speed->climb) ? $climb = $monster->speed->climb: $climb = '0 ft';
            isset($monster->speed->fly) ? $fly = $monster->speed->fly: $fly = '0 ft';
            isset($monster->speed->swim) ? $swim = $monster->speed->swim: $swim = '0 ft';
            echo '<div class="info">Speed: 
                    <div class="info">Walk: '.$walk.'</div>
                    <div class="info">Burrow: '.$burrow.'</div>
                    <div class="info">Climb: '.$climb.'</div>
                    <div class="info">Fly: '.$fly.'</div>
                    <div class="info">Swim: '.$swim.'</div>
                </div class="info">';}else{echo '<div>No speed available</div>';}
        echo '</div><div id="div4">';    
        if(isset($monster->image)){echo '<div class="info"><img src="https://www.dnd5eapi.co'.$monster->image.'"></div class="info">';}else{echo '<div>No image available</div>';}
        echo '</div></div></div></div><div id="div-line3"><div>';    
        if(isset($monster->hit_points)){echo '<div class="info">Hit Points: '.$monster->hit_points.'</div>';}else{echo '<div>No hit points available</div>';}
        if(isset($monster->hit_dice)){echo '<div class="info">Hit Dice: '.$monster->hit_dice.'</div>';}else{echo '<div>No hit dice available</div>';}
        if(isset($monster->hit_points_roll)){echo '<div class="info">Hit points roll: '.$monster->hit_points_roll.'</div>';}else{echo '<div>No hit points roll available</div>';}
        if(isset($monster->forms)){
            echo '<div class="info">Forms: </div>';
            foreach($monster->forms as $forms){
                echo '<div class="info">'.$forms->name.'</div>';
            }}else{echo '<div class="info">No forms available</div>';}

        if(isset($monster->languages)){echo '<div>Languages: '.$monster->languages.'</div>';}else{echo '<div>No languages available</div>';}
        if(isset($monster->reactions)){
            echo '<div class="info">Reactions: </div>';
            foreach($monster->reactions as $react){
                echo '<div class="info">'.$react->name.' - '.$react->desc.'</div>';
            }}else{echo '<div class="info">No reaction available</div>';}
        if(isset($monster->armor_class)){
            echo '<div class="info">Armor Class:</div>';
            foreach($monster->armor_class as $ac){
                if($ac->type=='dex'){
                    $desc = '';
                    if(isset($ac->desc)){$desc=$ac->desc;}else{$desc = ' - No description available';}
                    echo '<div class="info">'.$ac->type.': '.$ac->value.$desc.'</div>';
                }else if($ac->type=='natural'){
                    $desc = '';
                    if(isset($ac->desc)){$desc=$ac->desc;}else{$desc = ' - No description available';}
                    echo '<div class="info">'.$ac->type.': '.$ac->value.$desc.'</div>';
                }else if($ac->type=='armor'){
                    $desc = '';
                    $armor = '';
                    if(isset($ac->desc)){$desc=$ac->desc;}else{$desc = ' - No description available';}
                    if(isset($ac->armor)){$armor=$ac->armor[0]->name;}else{$armor = ' - No armor available';}
                    echo '<div class="info">'.$ac->type.': '.$ac->value.' - '.$armor.$desc.'</div>';
                }else if($ac->type=='spell'){
                    $desc = '';
                    $spell = '';
                    if(isset($ac->desc)){$desc=$ac->desc;}else{$desc = ' - No description available';}
                    if(isset($ac->spell)){$spell=$ac->spell->name;}else{$armor = ' - No spell available';}
                    echo '<div class="info">'.$ac->type.': '.$ac->value.' - '.$spell.$desc.'</div>';
                }else if($ac->type=='condition'){
                    $desc = '';
                    $condition = '';
                    if(isset($ac->desc)){$desc=$ac->desc;}else{$desc = ' - No description available';}
                    if(isset($ac->condition)){$condition=$ac->condition->name;}else{$armor = ' - No condition available';}
                    echo '<div class="info">'.$ac->type.': '.$ac->value.' - '.$condition.$desc.'</div>';
                }
            }}else{echo '<div class="info">No armor class available</div>';}
        echo '</div><div>';
        if(isset($monster->actions)){
            echo '<div class="info"><strong>Actions</strong></div><ul>';
            foreach($monster->actions as $act){
                echo '<div class="info"><li>'.$act->name.'</li></div>';
            }echo'</ul><br>';
            }else{echo '<div class="info">No actions available</div>';}
        if(isset($monster->legendary_actions)){
            echo '<div class="info"><strong>Legendary actions</strong></div><ul>';
            foreach($monster->legendary_actions as $lact){
                echo '<div class="info"><li>'.$lact->name.'</li></div>';
            }echo'</ul><br>';
            }else{echo '<div class="info">No legendary actions available</div>';}
        echo '</div><div>';
        if(isset($monster->condition_immunities)){
            echo '<div class="info"><strong>Condition immunities</strong></div><ul>';
            if(!empty($monster->condition_immunities)){
                foreach($monster->condition_immunities as $ci){
                    echo '<div class="info"><li>'.$ci->name.'</li></div>';
                }echo'</ul>';
                }else{echo '<div class="info">None</div>';}
            }else{echo '<div class="info">No condition immunities available</div>';}
        if(isset($monster->damage_immunities)){
            echo '<div class="info"><strong>Damage immunities</strong></div><ul>';
            if(!empty($monster->damage_immunities)){
                foreach($monster->damage_immunities as $di){
                    echo '<div class="info"><li>'.$di.'</li></div>';
                }echo '</ul>';
                }else{echo '<div>None</div>';}
            }else{echo '<div class="info">No damage immunities available</div>';}
        if(isset($monster->damage_resistances)){
            echo '<div class="info"><strong>Damage resistances</strong></div><ul>';
            if(!empty($monster->damage_resistances)){
                foreach($monster->damage_resistances as $dr){
                    echo '<div class="info"><li>'.$dr.'</li></div>';
                }echo '</ul>';}else{echo '<div class="info">None</div>';}
            }else{echo '<div class="info">No damage resistances available</div>';}
        if(isset($monster->damage_vulnerabilities)){
            echo '<div class="info"><strong>Damage vulnerabilities</strong></div><ul>';
            if(!empty($monster->damage_vulnerabilities)){
                foreach($monster->damage_vulnerabilities as $dv){
                    echo '<div class="info"><li>'.$dv.'</li></div>';
                }echo '</ul>';
                }else{echo '<div class="info">None</div>';}
            }else{echo '<div class="info">No damage vulnerabilities available</div>';}
        echo '</div><div>';
        if(isset($monster->proficiencies)){
            echo '<div class="info"><strong>Proficiencies</strong></div>';
            foreach($monster->proficiencies as $pro){
                echo '<div class="info">'.$pro->proficiency->name.' - '.$pro->value.'</div>';
            }}else{echo '<div class="info">No proficiencies available</div>';}
        echo '</div></div></div><div id="div-line4"><div>';
        if(isset($monster->senses)){
            isset($monster->senses->passive_perception) ? $pp = $monster->senses->passive_perception: $pp = '';
            isset($monster->senses->blindsight) ? $bs = $monster->senses->blindsight: $bs = '';
            isset($monster->senses->darkvision) ? $dv = $monster->senses->darkvision: $dv = '';
            isset($monster->senses->tremorsense) ? $trs = $monster->senses->tremorsense: $trs = '';
            isset($monster->senses->truesight) ? $ts = $monster->senses->truesight: $ts = '';
            echo '<div class="info" id="senses">Senses: 
                    <div class="info">Passive perception: '.$pp.'</div>
                    <div class="info">Blindsight: '.$bs.'</div>
                    <div class="info">Darkvision: '.$dv.'</div>
                    <div class="info">Tremorsense: '.$trs.'</div>
                    <div class="info">Truesight: '.$ts.'</div>
                </div class="info">';}else{echo '<div>No senses available</div>';}
        echo'</div><div>';
        if(isset($monster->special_abilities)){
            echo '<div class="info"><strong>Special abilities</strong></div><ul>';
            foreach($monster->special_abilities as $sa){
                echo '<div class="info"><li>'.$sa->name.' - '.$sa->desc.'</li></div>';
            }}else{echo '<div class="info">No special abilities available</div>';}
        echo'</ul></div></div>';
    }

?>


