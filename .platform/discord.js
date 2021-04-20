/**
 * Sends a color-coded formatted message to Discord.
 *
 * You must first configure a Platform.sh variable named "DISCORD_URL".
 * That is the group and channel to which the message will be sent.
 *
 * To control what events it will run on, use the --events switch in
 * the Platform.sh CLI.
 *
 * @param {string} title
 *   The title of the message block to send.
 * @param {string} message
 *   The message body to send.
 */
function sendDiscordMessage(title, message) {
    var url = variables()['DISCORD_URL'];

    if (!url) {
        throw new Error('You must define a DISCORD_URL project variable.');
    }

    if ((new Date).getDay() === 5) {
        title += " (On a Friday! :calendar:)";
    }

    var body = {
        content: title,
        embeds: [
            {
                description: message,
            }
        ]
    };

    var resp = fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(body),
    });

    if (!resp.ok) {
        console.log("Sending Discord message failed: " + resp.body.text());
    }
}

function variables() {
    var vars = {};
    activity.payload.deployment.variables.forEach(function(variable) {
        vars[variable.name] = variable.value;
    });

    return vars;
}

sendDiscordMessage(activity.text, activity.log);
