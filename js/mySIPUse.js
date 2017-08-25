/*
 * Check out the full guide at
 *   http://sipjs.com/guides/make-call/
 *
 * This sample uses
 *   http://sipjs.com/download/sip-0.7.0.min.js
 *
 * Login with your developer account to receive calls at
 *   http://sipjs.com/demo-phone
 */

var session;

var endButton = document.getElementById('endCall');
endButton.addEventListener("click", function () {
    session.bye();
    alert("Call Ended");
}, false);

//Creates the anonymous user agent so that you can make calls
var userAgent = new SIP.UA();

//here you determine whether the call has video and audio
var options = {
    media: {
        constraints: {
            audio: true,
            video: true
        },
        render: {
            remote: document.getElementById('remoteVideo'),
            local: document.getElementById('localVideo')
        }
    }
};
//makes the call
session = userAgent.invite('sip:welcome@onsip.com', options);

