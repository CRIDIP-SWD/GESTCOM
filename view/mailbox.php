<?php if(!isset($_GET['sub'])): ?>
    <section class="app">
        <aside class="aside-md emails-list">
            <section>
                <div class="mailbox-page clearfix">
                    <h1 class="pull-left">Boite de réception</h1>
                    <!--<div class="append-icon">
                        <input type="text" class="form-control form-white pull-right" id="email-search" placeholder="Search...">
                        <i class="icon-magnifier"></i>
                    </div>-->
                </div>
                <ul class="nav nav-tabs text-right">
                    <!--<li class="emails-action">
                        <i class="icon-rounded-arrow-curve-left"></i>
                        <i class=" icon-rounded-heart"></i>
                        <div class="pos-rel dis-inline">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" data-delay="300">
                                <i class=" icon-rounded-arrow-down-thin"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#" class="reorder-menu">Select All</a></li>
                                <li><a href="#" class="remove-menu">Not Read</a></li>
                                <li><a href="#" class="hide-top-sidebar">Read</a></li>
                            </ul>
                        </div>
                    </li>-->
                    <li class="active f-right"><a href="#recent" data-toggle="tab">Récent</a></li>
                    <li class="f-right"><a href="#alphabetically" data-toggle="tab">Alphabetique</a></li>
                </ul>-->
                <div class="tab-content">
                    <div class="tab-pane fade" id="alphabetically">
                        <div class="messages-list withScroll show-scroll" data-padding="180" data-height="window">
                            <?php
                            $sql_mail_recent = $DB->query("SELECT * FROM collab_inbox, users WHERE collab_inbox.expediteur = users.iduser AND destinataire = :iduser", array("iduser" => $user->iduser));
                            foreach($sql_mail_recent as $mail):
                            ?>
                            <div class="message-item media">
                                <div class="media">
                                    <img src="assets/images/avatars/avatar11_big.png" alt="avatar 3" width="40" class="sender-img">
                                    <div class="media-body">
                                        <div class="sender"><?= $mail->nom_user; ?> <?= $mail->prenom_user; ?></div>
                                        <div class="subject">
                                            <?php if($mail->importance == 1): ?>
                                            <i class="fa fa-flag text-danger"></i>
                                            <?php endif; ?>
                                            <span class="subject-text"><?= html_entity_decode($mail->sujet); ?></span>
                                        </div>
                                    </div>
                                    <div class="date"><?= $date_format->format($mail->date_message); ?></div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                            <div class="message-item media">
                                <div class="media">
                                    <img src="assets/images/avatars/avatar11_big.png" alt="avatar 3" width="40" class="sender-img">
                                    <div class="media-body">
                                        <div class="sender">Bobby Brown</div>
                                        <div class="subject"><span class="label label-danger">Work</span> <span class="subject-text">New contract</span></div>
                                        <div class="date">11 January</div>
                                    </div>
                                </div>
                            </div>
                            <div class="message-item media">
                                <div class="media">
                                    <img src="assets/images/avatars/avatar8_big.png" alt="avatar 3" width="40" class="sender-img">
                                    <div class="media-body">
                                        <div class="sender">Bobby Hook</div>
                                        <div class="subject"><span class="subject-text">Train Crossings</span></div>
                                        <div class="date">14th January</div>
                                    </div>
                                </div>
                            </div>
                            <div class="message-item media">
                                <div class="media">
                                    <img src="assets/images/avatars/avatar4_big.png" alt="avatar 3" width="40" class="sender-img">
                                    <div class="media-body">
                                        <div class="sender">John Snow</div>
                                        <div class="subject"><span class="label label-danger">Work</span> <span class="subject-text">Street Photographie</span></div>
                                        <div class="date">Today <strong>9:45am</strong></div>
                                        <div class="email-content">
                                            <p>Hi Steve,</p>
                                            <p>Good morning, oh in case i don't see you, good afternoon, good evening and goodnight. look ma i'm road kill excuse me, i'd like to ass you a few questions. your entrance was good, his was better. <br><br>Your entrance was good, his was better. look at that, it's exactly three seconds before i honk your nose and pull your underwear over your head. we got no food we got no money and our pets heads are falling off! haaaaaaarry. it's because i'm green isn't it! kinda hot in these rhinos. kinda hot in these rhinos. your entrance was good, his was better. we're going for a ride on the information super highway.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="message-item media">
                                <div class="media">
                                    <img src="assets/images/avatars/avatar6_big.png" alt="avatar 3" width="40" class="sender-img">
                                    <div class="media-body">
                                        <div class="sender">James Miller</div>
                                        <div class="subject"><span class="label label-blue">Family</span> <span class="subject-text">Mum's birthday gift</span></div>
                                        <div class="date">Yesterday <strong>2:30am</strong></div>
                                    </div>
                                </div>
                            </div>
                            <div class="message-item media">
                                <div class="media">
                                    <img src="assets/images/avatars/avatar7_big.png" alt="avatar 3" width="40" class="sender-img">
                                    <div class="media-body">
                                        <div class="sender">Martin Descker</div>
                                        <div class="subject"><i class="icon-paper-clip"></i><span class="subject-text">Mailchimp Support</span></div>
                                        <div class="date">Yesterday <strong>7:18pm</strong></div>
                                    </div>
                                </div>
                            </div>
                            <div class="message-item media">
                                <div class="media">
                                    <img src="assets/images/avatars/avatar5_big.png" alt="avatar 3" width="40" class="sender-img">
                                    <div class="media-body">
                                        <div class="sender">Kim Bauer</div>
                                        <div class="subject"><span class="subject-text">Not available during 24 hours</span></div>
                                        <div class="date">14th January</div>
                                    </div>
                                </div>
                            </div>
                            <div class="message-item media">
                                <div class="media">
                                    <img src="assets/images/avatars/avatar9_big.png" alt="avatar 3" width="40" class="sender-img">
                                    <div class="media-body">
                                        <div class="sender">Jack Jefferson</div>
                                        <div class="subject"><span class="label label-success">Friend</span> <span class="subject-text">Playstation 3?</span></div>
                                        <div class="date">12 January</div>
                                    </div>
                                </div>
                            </div>
                            <div class="message-item media">
                                <div class="media">
                                    <img src="assets/images/avatars/avatar10_big.png" alt="avatar 3" width="40" class="sender-img">
                                    <div class="media-body">
                                        <div class="sender">Sam Harris</div>
                                        <div class="subject"><span class="subject-text">Learning HTML and CSS</span></div>
                                        <div class="date">12 January</div>
                                    </div>
                                </div>
                            </div>
                            <div class="message-item media">
                                <div class="media">
                                    <img src="assets/images/avatars/avatar12_big.png" alt="avatar 3" width="40" class="sender-img">
                                    <div class="media-body">
                                        <div class="sender">Scott Thomson</div>
                                        <div class="subject"><i class="icon-paper-clip"></i><span class="subject-text">Product Expansion</span></div>
                                        <div class="date">11 January</div>
                                    </div>
                                </div>
                            </div>
                            <div class="message-item media">
                                <div class="media">
                                    <img src="assets/images/avatars/avatar13_big.png" alt="avatar 3" width="40" class="sender-img">
                                    <div class="media-body">
                                        <div class="sender">John Mac Douglas</div>
                                        <div class="subject"><span class="subject-text">News from Canada</span></div>
                                        <div class="date">10 January</div>
                                    </div>
                                </div>
                            </div>
                            <div class="message-item media">
                                <div class="media">
                                    <img src="assets/images/avatars/avatar1_big.png" alt="avatar 3" width="40" class="sender-img">
                                    <div class="media-body">
                                        <div class="sender">Michael B.</div>
                                        <div class="subject"><span class="subject-text">Re: your order</span></div>
                                        <div class="date">10 January</div>
                                    </div>
                                </div>
                            </div>
                            <div class="message-item media">
                                <div class="media">
                                    <img src="assets/images/avatars/avatar2_big.png" alt="avatar 3" width="40" class="sender-img">
                                    <div class="media-body">
                                        <div class="sender">Meagan Miller</div>
                                        <div class="subject"><i class="icon-paper-clip"></i><span class="subject-text">Advertising</span></div>
                                        <div class="date">9 January</div>
                                    </div>
                                </div>
                            </div>
                            <div class="message-item media">
                                <div class="media">
                                    <img src="assets/images/avatars/avatar4_big.png" alt="avatar 3" width="40" class="sender-img">
                                    <div class="media-body">
                                        <div class="sender">Fred Aster</div>
                                        <div class="subject"><span class="subject-text">Brooklyn Beta</span></div>
                                        <div class="date">9 January</div>
                                    </div>
                                </div>
                            </div>
                            <div class="message-item media">
                                <div class="media">
                                    <img src="assets/images/avatars/avatar3_big.png" alt="avatar 3" width="40" class="sender-img">
                                    <div class="media-body">
                                        <div class="sender">Aretha Franlin</div>
                                        <div class="subject"><span class="subject-text">Just a new email</span></div>
                                        <div class="date">8 January</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade in active" id="recent">
                        <div class="messages-list withScroll show-scroll" data-padding="180" data-height="window">
                            <div class="message-item media">
                                <div class="media">
                                    <img src="assets/images/avatars/avatar4_big.png" alt="avatar 3" width="40" class="sender-img">
                                    <div class="media-body">
                                        <div class="sender">John Snow</div>
                                        <div class="subject"><span class="label label-danger">Work</span> <span class="subject-text">Street Photographie</span></div>
                                        <div class="date">Today <strong>9:45am</strong></div>
                                        <div class="email-content">
                                            <p>Hi Steve,</p>
                                            <p>Visual hierarchy is one of the most important principles behind effective web design. This article will examine why developing a visual hierarchy is crucial on the web, the theory behind it, and how you can use some very basic exercises in your own designs to put these principles into practice.</p>
                                            <blockquote class="blue">
                                                <p><strong>Design is a funny word. Some people think design means how it looks. But of course, if you dig deeper, it's really how it works.</strong></p>
                                            </blockquote>
                                            <p>At it's core, design is all about visual communication: To be an effective designer, you have to be able to clearly communicate your ideas to viewers or else lose their attention.</p>
                                            <div class="email-attachment clearfix">
                                                <div class="attachments"><span><i class="fa fa-file-image-o"></i> Home.jpg <span class="small">(10mb)</span></span><span><i class="fa fa-file-pdf-o"></i> Resume.pdf <span class="small">(5.2mb)</span></span></div>
                                                <div class="attachments-actions">
                                                    <div class="move-attachments"><i class=" icon-rounded-arrow-left-thin"></i><i class=" icon-rounded-arrow-right-thin"></i></div>
                                                    <div class="download-attachment"><i class="icon-rounded-download"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="message-item media">
                                <div class="media">
                                    <img src="assets/images/avatars/avatar3_big.png" alt="avatar 3" width="40" class="sender-img">
                                    <div class="media-body">
                                        <div class="sender">Sarah Higgle</div>
                                        <div class="subject"><span class="subject-text">Theory of Design</span></div>
                                        <div class="date">Today <strong>8:10am</strong></div>
                                        <div class="email-content">
                                            <p>Hey you,</p>
                                            <p>Look at that, it's exactly three seconds before i honk your nose and pull your underwear over your head. brain freeze. i just heard about evans new position,good luck to you evan backstabber, bastard, i mean baxter. <br><br>Hey, maybe i will give you a call sometime. your number still 911? it's because i'm green isn't it! excuse me, i'd like to ass you a few questions. alrighty then here she comes to wreck the day. we're going for a ride on the information super highway. alrighty then good morning, oh in case i don't see you, good afternoon, good evening and goodnight. it's because i'm green isn't it!</p>
                                            <div class="email-attachment clearfix">
                                                <div class="attachments">
                                                    <span><i class="fa fa-file-image-o"></i> Dreamworks.jpg <span class="small">(5.2mb)</span></span>
                                                </div>
                                                <div class="attachments-actions">
                                                    <div class="move-attachments">
                                                        <i class=" icon-rounded-arrow-left-thin"></i>
                                                        <i class=" icon-rounded-arrow-right-thin"></i>
                                                    </div>
                                                    <div class="download-attachment">
                                                        <i class="icon-rounded-download"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="message-item media">
                                <div class="media">
                                    <img src="assets/images/avatars/avatar6_big.png" alt="avatar 3" width="40" class="sender-img">
                                    <div class="media-body">
                                        <div class="sender">James Miller</div>
                                        <div class="subject"><span class="label label-blue">Family</span> <span class="subject-text">Mum's birthday gift</span></div>
                                        <div class="date">Yesterday <strong>2:30am</strong></div>
                                        <div class="email-content">
                                            <p>Hey you,</p>
                                            <p>Excuse me, i'd like to ass you a few questions. hey, maybe i will give you a call sometime. your number still 911? <br><br>Excuse me, i'd like to ass you a few questions. alrighty then alrighty then i just heard about evans new position,good luck to you evan backstabber, bastard, i mean baxter. i just heard about evans new position,good luck to you evan backstabber, bastard, i mean baxter. good morning, oh in case i don't see you, good afternoon, good evening and goodnight. <br><br>Alrighty then your entrance was good, his was better. here she comes to wreck the day. look ma i'm road kill</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="message-item media">
                                <div class="media">
                                    <img src="assets/images/avatars/avatar7_big.png" alt="avatar 3" width="40" class="sender-img">
                                    <div class="media-body">
                                        <div class="sender">Martin Descker</div>
                                        <div class="subject"><i class="icon-paper-clip"></i><span class="subject-text">Mailchimp Support</span></div>
                                        <div class="date">Yesterday <strong>7:18pm</strong></div>
                                        <div class="email-content">
                                            <p>Hey,</p>
                                            <p>Well, then, i confess, it is my intention to commandeer one of these ships, pick up a crew in tortuga, raid, pillage, plunder and otherwise pilfer my weasely black guts out. what? no. we can't stop here. this is bat country. we are very much alike, you and i, i and you... us. holy jesus. what are these goddamn animals? we're not sheep! holy jesus. what are these goddamn animals? what? no. we can't stop here. this is bat country. <br><br>Do you like my meadow? try some of my grass! please have a blade, please do, it's so delectable and so darn good looking! giddy-up... no, no this way... good horsey. do you like my meadow? try some of my grass! please have a blade, please do, it's so delectable and so darn good looking! do you like my meadow? try some of my grass! please have a blade, please do, it's so delectable and so darn good looking! giddy-up... no, no this way... good horsey.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="message-item media">
                                <div class="media">
                                    <img src="assets/images/avatars/avatar5_big.png" alt="avatar 3" width="40" class="sender-img">
                                    <div class="media-body">
                                        <div class="sender">Kim Bauer</div>
                                        <div class="subject"><span class="subject-text">Not available during 24 hours</span></div>
                                        <div class="date">14th January</div>
                                        <div class="email-content">
                                            <p>Hello,</p>
                                            <p>Forget about it" is, like, if you agree with someone, you know, like "raquel welch is one great piece of ass. forget about it!" but then, if you disagree, like "a lincoln is better than a cadillac? forget about it!" <br><br>You know? but then, it's also like if something's the greatest thing in the world, like, "minghia! those peppers! forget about it!" we are very much alike, you and i, i and you... us. do you like my meadow? try some of my grass! please have a blade, please do, it's so delectable and so darn good looking! what? no. we can't stop here. this is bat country. what? no. we can't stop here. this is bat country. we're not sheep! we are very much alike, you and i, i and you... us. we are very much alike, you and i, i and you... us. forget about it" is, like, if you agree with someone, you know, like "raquel welch is one great piece of ass. forget about it!" but then, if you disagree, like "a lincoln is better than a cadillac? forget about it!" you know? but then, it's also like if something's the greatest thing in the world, like, "minghia! those peppers! forget about it!" what? no. we can't stop here. this is bat country. me? i'm dishonest, and a dishonest man you can always trust to be dishonest. honestly. it's the honest ones you want to watch out for, because you can never predict when they're going to do something incredibly... stupid. we had two bags of grass, seventy-five pellets of mescaline, five sheets of high-powered blotter acid, a saltshaker half-full of cocaine, and a whole galaxy of multi-colored uppers, downers, screamers, laughers...</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="message-item media">
                                <div class="media">
                                    <img src="assets/images/avatars/avatar8_big.png" alt="avatar 3" width="40" class="sender-img">
                                    <div class="media-body">
                                        <div class="sender">Bobby Hook</div>
                                        <div class="subject"><span class="subject-text">Train Crossings</span></div>
                                        <div class="date">14th January</div>
                                        <div class="email-content">
                                            <p>Mr G,</p>
                                            <p>Giddy-up... no, no this way... good horsey. do you like my meadow? try some of my grass! please have a blade, please do, it's so delectable and so darn good looking! giddy-up... no, no this way... good horsey. <br><br>Do you like my meadow? try some of my grass! please have a blade, please do, it's so delectable and so darn good looking! we had two bags of grass, seventy-five pellets of mescaline, five sheets of high-powered blotter acid, a saltshaker half-full of cocaine, and a whole galaxy of multi-colored uppers, downers, screamers, laughers... me? i'm dishonest, and a dishonest man you can always trust to be dishonest. honestly. it's the honest ones you want to watch out for, because you can never predict when they're going to do something incredibly... stupid. me? i'm dishonest, and a dishonest man you can always trust to be dishonest. honestly. it's the honest ones you want to watch out for, because you can never predict when they're going to do something incredibly...</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="message-item media">
                                <div class="media">
                                    <img src="assets/images/avatars/avatar9_big.png" alt="avatar 3" width="40" class="sender-img">
                                    <div class="media-body">
                                        <div class="sender">Jack Jefferson</div>
                                        <div class="subject"><span class="label label-success">Friend</span> <span class="subject-text">Playstation 3?</span></div>
                                        <div class="date">12 January</div>
                                        <div class="email-content">
                                            <p>Hey,</p>
                                            <p>Excuse me, i'd like to ass you a few questions. hey, maybe i will give you a call sometime. your number still 911? excuse me, i'd like to ass you a few questions. <br><br>Alrighty then alrighty then i just heard about evans new position,good luck to you evan backstabber, bastard, i mean baxter. i just heard about evans new position,good luck to you evan backstabber, bastard, i mean baxter. good morning, oh in case i don't see you, good afternoon, good evening and goodnight. alrighty then your entrance was good, his was better. here she comes to wreck the day. look ma i'm road kill</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="message-item media">
                                <div class="media">
                                    <img src="assets/images/avatars/avatar10_big.png" alt="avatar 3" width="40" class="sender-img">
                                    <div class="media-body">
                                        <div class="sender">Sam Harris</div>
                                        <div class="subject"><span class="subject-text">Learning HTML and CSS</span></div>
                                        <div class="date">12 January</div>
                                        <div class="email-content">
                                            <p>Hola,</p>
                                            <p>You're going for a ride on the information super highway. i just heard about evans new position,good luck to you evan backstabber, bastard, i mean baxter. hey, maybe i will give you a call sometime. your number still 911? brain freeze. <br><br>Your entrance was good, his was better. look ma i'm road kill your entrance was good, his was better. i just heard about evans new position,good luck to you evan backstabber, bastard, i mean baxter. good morning, oh in case i don't see you, good afternoon, good evening and goodnight. we're going for a ride on the information super highway. hey, maybe i will give you a call sometime. your number still 911? hey, maybe i will give you a call sometime. your number still 911?</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="message-item media">
                                <div class="media">
                                    <img src="assets/images/avatars/avatar11_big.png" alt="avatar 3" width="40" class="sender-img">
                                    <div class="media-body">
                                        <div class="sender">Bobby Brown</div>
                                        <div class="subject"><span class="label label-danger">Work</span> <span class="subject-text">New contract</span></div>
                                        <div class="date">11 January</div>
                                        <div class="email-content">
                                            <p>Hey,</p>
                                            <p>Alrighty then kinda hot in these rhinos. brain freeze. look at that, it's exactly three seconds before i honk your nose and pull your underwear over your head. good morning, oh in case i don't see you, good afternoon, good evening and goodnight. we got no food we got no money and our pets heads are falling off! haaaaaaarry. look ma i'm road kill excuse me, i'd like to ass you a few questions. good morning, oh in case i don't see you, good afternoon, good evening and goodnight. look at that, it's exactly three seconds before i honk your nose and pull your underwear over your head. we're going for a ride on the information super highway. hey, maybe i will give you a call sometime. your number still 911?</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="message-item media">
                                <div class="media">
                                    <img src="assets/images/avatars/avatar12_big.png" alt="avatar 3" width="40" class="sender-img">
                                    <div class="media-body">
                                        <div class="sender">Scott Thomson</div>
                                        <div class="subject"><i class="icon-paper-clip"></i><span class="subject-text">Product Expansion</span></div>
                                        <div class="date">11 January</div>
                                        <div class="email-content">
                                            <p>Hello,</p>
                                            <p>We got no food we got no money and our pets heads are falling off! haaaaaaarry. i just heard about evans new position,good luck to you evan backstabber, bastard, i mean baxter. i just heard about evans new position,good luck to you evan backstabber, bastard, i mean baxter. look ma i'm road kill your entrance was good, his was better. we got no food we got no money and our pets heads are falling off! haaaaaaarry. it's because i'm green isn't it! brain freeze. kinda hot in these rhinos. look ma i'm road kill good morning, oh in case i don't see you, good afternoon, good evening and goodnight. excuse me, i'd like to ass you a few questions.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="message-item media">
                                <div class="media">
                                    <img src="assets/images/avatars/avatar13_big.png" alt="avatar 3" width="40" class="sender-img">
                                    <div class="media-body">
                                        <div class="sender">John Mac Douglas</div>
                                        <div class="subject"><span class="subject-text">News from Canada</span></div>
                                        <div class="date">10 January</div>
                                        <div class="email-content">
                                            <p>Dear you,</p>
                                            <p>Gentlemen, as of this moment, i am that second mouse. i'm neglecting my other guests. enjoy yourself, you'll find the young ladies stimulating company. you know why the yankees always win, frank? it's 'cause the other teams can't stop staring at those damn pinstripes. i don't know what you want, but i know i can get it for you, with a minimum of fuss! money, jewels, a *very* big ball of string. he hid it in the one place he knew he could hide something: his ass. five long years, he wore this watch up his ass. then, when he died of dysentery, he gave me the watch. this is america, babe, you gotta think big to be big.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="message-item media">
                                <div class="media">
                                    <img src="assets/images/avatars/avatar1_big.png" alt="avatar 3" width="40" class="sender-img">
                                    <div class="media-body">
                                        <div class="sender">Michael B.</div>
                                        <div class="subject"><span class="subject-text">Re: your order</span></div>
                                        <div class="date">10 January</div>
                                        <div class="email-content">
                                            <p>Hey you,</p>
                                            <p>Alrighty then kinda hot in these rhinos. brain freeze. look at that, it's exactly three seconds before i honk your nose and pull your underwear over your head. good morning, oh in case i don't see you, good afternoon, good evening and goodnight. we got no food we got no money and our pets heads are falling off! haaaaaaarry. look ma i'm road kill excuse me, i'd like to ass you a few questions. good morning, oh in case i don't see you, good afternoon, good evening and goodnight. look at that, it's exactly three seconds before i honk your nose and pull your underwear over your head. we're going for a ride on the information super highway. hey, maybe i will give you a call sometime. your number still 911?</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="message-item media">
                                <div class="media">
                                    <img src="assets/images/avatars/avatar2_big.png" alt="avatar 3" width="40" class="sender-img">
                                    <div class="media-body">
                                        <div class="sender">Meagan Miller</div>
                                        <div class="subject"><i class="icon-paper-clip"></i><span class="subject-text">Advertising</span></div>
                                        <div class="date">9 January</div>
                                        <div class="email-content">
                                            <p>Hello,</p>
                                            <p>We got no food we got no money and our pets heads are falling off! haaaaaaarry. i just heard about evans new position,good luck to you evan backstabber, bastard, i mean baxter. i just heard about evans new position,good luck to you evan backstabber, bastard, i mean baxter. look ma i'm road kill your entrance was good, his was better. we got no food we got no money and our pets heads are falling off! haaaaaaarry. it's because i'm green isn't it! brain freeze. kinda hot in these rhinos. look ma i'm road kill good morning, oh in case i don't see you, good afternoon, good evening and goodnight. excuse me, i'd like to ass you a few questions.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="message-item media">
                                <div class="media">
                                    <img src="assets/images/avatars/avatar4_big.png" alt="avatar 3" width="40" class="sender-img">
                                    <div class="media-body">
                                        <div class="sender">Fred Aster</div>
                                        <div class="subject"><span class="subject-text">Brooklyn Beta</span></div>
                                        <div class="date">9 January</div>
                                        <div class="email-content">
                                            <p>Mr G,</p>
                                            <p>Giddy-up... no, no this way... good horsey. do you like my meadow? try some of my grass! please have a blade, please do, it's so delectable and so darn good looking! giddy-up... no, no this way... good horsey. do you like my meadow? try some of my grass! please have a blade, please do, it's so delectable and so darn good looking! we had two bags of grass, seventy-five pellets of mescaline, five sheets of high-powered blotter acid, a saltshaker half-full of cocaine, and a whole galaxy of multi-colored uppers, downers, screamers, laughers... me? i'm dishonest, and a dishonest man you can always trust to be dishonest. honestly. it's the honest ones you want to watch out for, because you can never predict when they're going to do something incredibly... stupid. me? i'm dishonest, and a dishonest man you can always trust to be dishonest. honestly. it's the honest ones you want to watch out for, because you can never predict when they're going to do something incredibly...</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="message-item media">
                                <div class="media">
                                    <img src="assets/images/avatars/avatar3_big.png" alt="avatar 3" width="40" class="sender-img">
                                    <div class="media-body">
                                        <div class="sender">Aretha Franlin</div>
                                        <div class="subject"><span class="subject-text">Just a new email</span></div>
                                        <div class="date">8 January</div>
                                        <div class="email-content">
                                            <p>Hola,</p>
                                            <p>You're going for a ride on the information super highway. i just heard about evans new position,good luck to you evan backstabber, bastard, i mean baxter. hey, maybe i will give you a call sometime. your number still 911? brain freeze. your entrance was good, his was better. look ma i'm road kill your entrance was good, his was better. i just heard about evans new position,good luck to you evan backstabber, bastard, i mean baxter. good morning, oh in case i don't see you, good afternoon, good evening and goodnight. we're going for a ride on the information super highway. hey, maybe i will give you a call sometime. your number still 911? hey, maybe i will give you a call sometime. your number still 911?</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </aside>
        <div class="email-details">
            <section>
                <div class="email-subject">
                    <h1>Theory of <strong>Design</strong></h1>
                    <div class="clearfix">
                        <div class="go-back-list"><i data-rel="tooltip" data-placement="bottom" data-original-title="Back to email list" class="icon-arrow-left"></i></div>
                        <p>from <strong><span class="sender">Sandra Merlin</span></strong> &bull; <span class="date">16 January, 4:04pm</span></p>
                        <div class="pos-rel pull-left">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" data-delay="300">
                                <i class=" icon-rounded-arrow-down-thin"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#" class="reorder-menu">Delete email</a></li>
                                <li><a href="#" class="remove-menu">Move</a></li>
                                <li><a href="#" class="hide-top-sidebar">Print</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="email-details-inner withScroll" data-height="window" data-padding="155">
                    <div class="email-content">
                        <p>Hi Steve,</p>
                        <p>Visual hierarchy is one of the most important principles behind effective web design. We will see how you can use some very basic exercises in your own designs to put these principles into practice.</p>
                        <blockquote class="blue">
                            <p><strong>Design is a funny word. Some people think design means how it looks. But of course, if you dig deeper, it's really how it works.</strong></p>
                        </blockquote>
                        <p>At it's core, design is all about visual communication: To be an effective designer, you have to be able to clearly communicate your ideas to viewers or else lose their attention.</p>
                        <div class="email-attachment clearfix">
                            <div class="attachments">
                                <span><i class="fa fa-file-image-o"></i> Home.jpg <span class="small">(10mb)</span></span>
                                <span><i class="fa fa-file-pdf-o"></i> Resume.pdf <span class="small">(5.2mb)</span></span>
                            </div>
                            <div class="attachments-actions">
                                <div class="move-attachments">
                                    <i class=" icon-rounded-arrow-left-thin"></i>
                                    <i class=" icon-rounded-arrow-right-thin"></i>
                                </div>
                                <div class="download-attachment">
                                    <i class="icon-rounded-download"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="answers">
                        <div class="answer-subject">
                            <h2 class="answer-title"></h2>
                            <p>from <strong>me</strong> &bull; <span class="answer-date"></span></p>
                        </div>
                        <div class="answer-content"></div>
                    </div>
                    <div class="write-answer">
                        <div class="answer-textarea"></div>
                        <button id="save" class="btn btn-primary" type="button">Send</button>
                    </div>
                </div>
            </section>
        </div>
    </section>
<?php endif; ?>
<script src="<?= $constante->getUrl(array('plugins/')); ?>charts-morris/raphael.min.js"></script> <!-- Morris Charts -->
<script src="<?= $constante->getUrl(array('plugins/')); ?>charts-morris/morris.min.js"></script> <!-- Morris Charts -->
<script src="<?= $constante->getUrl(array('plugins/')); ?>summernote/summernote.min.js"></script>
<script src="<?= $constante->getUrl(array('plugins/')); ?>custom/js/pages/mailbox.js"></script>