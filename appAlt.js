const https = require('https');
const AWS = require('aws-sdk');
const { v4: uuidv4 } = require('uuid');

const endpoint = '';
const region = 'us-east-1';

// Create an AWS Signature Version 4 signer
const signer = new AWS.Signers.V4({
    region: region,
    service: 'iotdata'
});

// Set up the MQTT message to send
const message = {
    brightnessLevel: 50,
    proximitySensor: true
};

// Create a unique client ID and topic for the message
const clientId = uuidv4();
const topic = 'smart-lighting';

// Set up the HTTPS request options
const options = {
    method: 'POST',
    hostname: endpoint,
    path: '/topics/' + topic + '?qos=0',
    headers: {
        'Content-Type': 'application/json',
        'x-amzn-iot-thingname': clientId
    }
};

// Sign the HTTPS request with AWS Signature Version 4
const request = https.request(options, function(response) {
    let responseData = '';
    response.setEncoding('utf8');
    response.on('data', function(chunk) {
        responseData += chunk;
    });
    response.on('end', function() {
        console.log('Message sent to AWS IoT Core:', message);
    });
});

signer.sign(request, { headers: options.headers }, function() {
    // Send the HTTPS request
    request.write(JSON.stringify(message));
    request.end();
});
