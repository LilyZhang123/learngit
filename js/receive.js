
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

//user agent configuration
var configuration = {
    uri: 'test@example.com',
    authorizationUser: 'test',
    password: 'password',
};

var userAgent = new SIP.UA(configuration);

userAgent.on('invite', function (session) {
    session.accept({
        media: {
            render: {
                remote: document.getElementById('remoteVideo'),
                local: document.getElementById('localVideo')
            }
        }
    });
});