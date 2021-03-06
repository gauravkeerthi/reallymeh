
        <nav class="navbar navbar-default" role="navigation"> 
            <div class="container-fluid"> 
                <div class="navbar-header"> 
                    <a class="navbar-brand aqua" href="/">REALLY, MEH?</a> 
                </div>                 
            </div>             
        </nav>
        <div class="container quiz-title-class">
            <h3><?php echo $quiz['name']; ?></h3>
            <div class="well">
                <div class="row">
                    <div class="col-xs-6"><?php echo date('d M',strtotime($quiz['createdat'])); ?></div>
                    <div class="col-xs-3 text-right"><?php echo $quiz['numparticipants']; ?><i class="fa fa-users fa-lg"></i></div>
                    <div class="col-xs-3 text-right">
                        <span class="fb-comments-count" data-href="http://www.gauravkeerthi.com/reallymeh/quiz/<?php echo $eachquiz['id']; ?>"></span> 
                        <i class="fa fa-comments fa-lg"></i> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p><?php echo $quiz['description']; ?></p>
                    </div>
                </div>
            </div>             
        </div>
    <form method="POST" action="/submit">
        <input type="hidden" name="quiz_id_fk" value="<?php echo $quiz['id']; ?>">
        <input type="hidden" name="ipaddress" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>">
        
        <div class="container">
        
        <?php foreach (($questions?:[]) as $count=>$question): ?>
            
            <div class="row">
                <div class="col-md-6">
                    <h5><?php echo $count + 1; ?>. <?php echo $question['text']; ?></h5> 
                </div>            
                <div class="col-md-6">
                    <select class="form-control bg-silver" name="question<?php echo $question['id']; ?>"> 
                      <?php switch ($question['options']['0']['optiontype']): ?><?php case '100percent': ?>
                            <option value="1">1%</option>
                            <option value="100">100%</option>
                        <?php break; ?><?php case 'CUSTOM': ?>
                            <?php foreach (($question['options']?:[]) as $option): ?>
                                <option value="<?php echo $option['text']; ?>"><?php echo $option['text']; ?></option>
                            <?php endforeach; ?>
                        <?php break; ?><?php endswitch; ?>    
                    </select>        
                </div>
            </div>

        <?php endforeach; ?>    
        <hr class="bg-silver" />
        </div>
        
        <div class="container">
            <div class="well">
                <p>In order to compare your results against other participants, we need to know a little bit about you. We do <b>not</b> require your name, email, or any other personal identification information.</p>
            </div>
            <table class="table"> 
                <tr> 
                    <td class="pad20 col-xs-3">Your Gender:</td> 
                    <td class="col-xs-9">
                        <div class="radio"> 
                            <ul class="radio-button">
                                <li>
                                    <input type="radio" name="gender" value="male" checked id="gender_m">
                                    <label for="gender_m">MALE</label>                                     
                                </li>
                                <li>
                                    <input type="radio" name="gender" value="male" id="gender_f">
                                    <label for="gender_f">FEMALE</label>                                     
                                </li>
                            </ul>                             
                        </div>
                    </td>                     
                </tr>                 
                <tr> 
                    <td class="pad20">Your Age:</td> 
                    <td>
                        <div class="radio"> 
                            <ul class="radio-button">
                                <li>
                                    <input type="radio" name="age" value="teen" checked id="age_teen">
                                    <label for="age_teen">&lt; 19</label>                                     
                                </li>
                                <li>
                                    <input type="radio" name="age" value="20" id="age_20">
                                    <label for="age_20">20s</label>                                     
                                </li>
                                <li>
                                    <input type="radio" name="age" value="30" id="age_30">
                                    <label for="age_30">30s</label>                                     
                                </li>
                                <li>
                                    <input type="radio" name="age" value="40" id="age_40">
                                    <label for="age_40">40s</label>                                     
                                </li>
                                <li>
                                    <input type="radio" name="age" value="50" id="age_50">
                                    <label for="age_50">50s</label>                                     
                                </li>
                                <li>
                                    <input type="radio" name="age" value="60" id="age_60">
                                    <label for="age_60">&gt; 60</label>                                     
                                </li>
                            </ul>                             
                        </div>
                    </td>                     
                </tr>
                <tr> 
                    <td class="pad20">Your Race:</td> 
                    <td>
                        <ul class="radio-button">
                            <li>
                                <input type="radio" name="race" value="chinese" checked id="race_c">
                                <label for="race_c">CHINESE</label>                                 
                            </li>
                            <li>
                                <input type="radio" name="race" value="malay" id="race_m">
                                <label for="race_m">MALAY</label>                                 
                            </li>
                            <li>
                                <input type="radio" name="race" value="indian" id="race_i">
                                <label for="race_i">INDIAN</label>                                 
                            </li>
                            <li>
                                <input type="radio" name="race" value="others" id="race_o">
                                <label for="race_o">OTHERS</label>                                 
                            </li>
                        </ul>                         
                    </td>                     
                </tr>
                <tr> 
                    <td class="pad20">Your Religion:</td> 
                    <td>
                        <ul class="radio-button">
                            <li>
                                <input type="radio" name="religion" value="buddhism" checked id="religion_b">
                                <label for="religion_b">BUDDHISM</label>                                 
                            </li>
                            <li>
                                <input type="radio" name="religion" value="christianity" id="religion_c">
                                <label for="religion_c">CHRISTIANITY</label>                                 
                            </li>                             
                            <li>
                                <input type="radio" name="religion" value="islam" id="religion_i">
                                <label for="religion_i">ISLAM</label>                                 
                            </li>
                            <li>
                                <input type="radio" name="religion" value="taoism" id="religion_t">
                                <label for="religion_t">TAOISM</label>                                 
                            </li>
                            <li>
                                <input type="radio" name="religion" value="hinduism" id="religion_h">
                                <label for="religion_h">HINDUISM</label>                                 
                            </li>
                            <li>
                                <input type="radio" name="religion" value="sikhism" id="religion_s">
                                <label for="religion_s">SIKHISM</label>                                 
                            </li>
                            <li>
                                <input type="radio" name="religion" value="other" id="religion_o">
                                <label for="religion_c">OTHER</label>                                 
                            </li>
                            <li>
                                <input type="radio" name="religion" value="none" id="religion_n">
                                <label for="religion_n">NONE</label>                                 
                            </li>
                        </ul>                         
                    </td>                     
                </tr>                 
                <tr> 
                    <td class="pad20">Your Location:</td> 
                    <td class="pad20"><input type="hidden" name="location" value="singapore">Singapore</td> 
                </tr>                 
            </table>
            <button class="btn btn-primary btn-block">Compute results</button>
            <hr class="bg-silver" />
        </div> 
    </form>

    </body>     
</html>
