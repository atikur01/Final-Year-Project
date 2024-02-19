const express = require("express");
const bodyParser = require("body-parser");
const { EmailClient } = require("@azure/communication-email");

const app = express();
const port = 3000; // Use the desired port

// This code retrieves your connection string from an environment variable.
const connectionString = "endpoint=https://communication-service-resource-1.unitedstates.communication.azure.com/;accesskey=boyouDdZ7MbN7qMZU/f4ZpfNg/QChDHaLT7CtRUvrjSxv9Usy7iFJP6yWg7JVfQdPWHBtEKGhjevfHsc58Vl3A==";
const client = new EmailClient(connectionString);

// Middleware to parse JSON in POST requests
app.use(bodyParser.json());

// Endpoint to handle POST requests
app.post("/send-email", async (req, res) => {
    // Extract information from the POST request
    const { subject, message, to } = req.body;

    // Construct the email message
    const emailMessage = {
        senderAddress: "DoNotReply@dcf1db72-af8d-4744-93dd-ca34e1bb5894.azurecomm.net",
        content: {
            subject,
            message,
        },
        recipients: {
            to: [{ address: to }],
        },
    };

    // Send the email
    try {
        const poller = await client.beginSend(emailMessage);
        const result = await poller.pollUntilDone();
        res.status(200).json({ success: true, result });
    } catch (error) {
        console.error("Error sending email:", error);
        res.status(500).json({ success: false, error: "Internal Server Error" });
    }
});

// Start the server
app.listen(port, () => {
    console.log(`Server is running on port ${port}`);
});
