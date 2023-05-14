const form = document.getElementById('my-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();
  const formData = new FormData(form);
  const brightnessLevel = formData.get('brightness-level');
  const proximitySensor = formData.get('proximity-sensor');

  // Define the MQTT endpoint and credentials
  const endpoint = "";
  const rootCAPath = "";
  const certificatePath = "";
  const privateKeyPath = "";
  const clientId = "";
  const topic = "";

  // Create an object with the form data to send to the MQTT endpoint
  const message = {
    brightnessLevel,
    proximitySensor
  };

  // Connect to the MQTT endpoint
  const client = new Paho.MQTT.Client(endpoint, clientId);
  client.connect({
    onSuccess: function() {
      console.log("Connected to MQTT endpoint");
      client.subscribe(topic);
      const messageToSend = new Paho.MQTT.Message(JSON.stringify(message));
      messageToSend.destinationName = topic;
      client.send(messageToSend);
      console.log("Sent message:", message);
    },
    onFailure: function() {
      console.error("Failed to connect to MQTT endpoint");
    },
    useSSL: true,
    userName: "my-username",
    password: "my-password"
  });
});

/*Note that you will need to replace the MQTT endpoint, credentials, and other information with your own information.*/

const applyButton = document.querySelector('input[type="submit"]');
if (applyButton) {
  applyButton.addEventListener('click', function() {
    // code to handle click event
  });
}
