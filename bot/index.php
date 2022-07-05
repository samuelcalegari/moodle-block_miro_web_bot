<?php

// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * @package   block_miro_web_bot
 * @copyright 2020 Moodle Pty Ltd (http://moodle.com)
 * @author    Samuel Calegari
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

    require_once("../../../config.php");
    global $USER, $PAGE, $CFG;
    $PAGE->set_context(context_system::instance());

    if($USER->id !=0) {

        $userpicture = new user_picture($USER);
        $userpicture->size = 1; // Size f1.
        $avatar = $userpicture->get_url($PAGE)->out(false);
        $username = $USER->username;
        $firstname = substr($USER->firstname,0,1);
        $lastname = substr($USER->lastname,0,1);
        $initials = strtoupper($firstname . $lastname);
    }

    $bearer = get_config('block_miro_web_bot', 'bearer');
?>
<!DOCTYPE html>
<html>
<head>
    <style>
        html, body { height: 100% }
        body {
            margin: 0;
        }

        #webchat {
            height: 100%;
            width: 100%;
        }
    </style>
</head>
<body>
<div id="webchat" role="main"></div>
<script src="https://cdn.botframework.com/botframework-webchat/latest/webchat.js"></script>
<script>

    (async function() {

        const res = await fetch('https://directline.botframework.com/v3/directline/tokens/generate', {
            method: 'POST',
            headers: { 'Authorization': 'Bearer <?php echo $bearer?>'}
        });

        const { token } = await res.json();


        const styleOptions = {
            bubbleBackground: '#fff',
            bubbleTextColor: '#333',
            bubbleFromUserBackground: '#1b78ce',
            bubbleFromUserTextColor: '#fff',
            botAvatarImage: 'https://raw.githubusercontent.com/samuelcalegari/assets/main/bot.png',
            botAvatarInitials: 'MB',
            userAvatarImage: '<?php echo ($avatar)?>',
            userAvatarInitials: '<?php echo ($initials)?>',
            notificationText: '#999',
            timestampColor: '#999',
            backgroundColor: '#eee',
            botAvatarBackgroundColor: '#fff',
            userAvatarBackgroundColor: '#fff',
        };

        const store = window.WebChat.createStore({}, ({ dispatch }) => next => action => {
            //console.log(action);
            if (action.type === 'DIRECT_LINE/CONNECT_FULFILLED') {
                dispatch({
                    type: 'WEB_CHAT/SEND_EVENT',
                    payload: {
                        name: 'webchat/join',
                        value: { language: window.navigator.language, moodleid : '<?php echo ($username)?>' }
                    }
                });
            }

            return next(action);
        });

        window.WebChat.renderWebChat(
            {
                directLine: window.WebChat.createDirectLine({
                    token: token
                }),
                store,
                styleOptions
            },
            document.getElementById('webchat')
        );


    })().catch(err => console.error(err));

</script>
</body>
</html>
