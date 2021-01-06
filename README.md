const express = require('express')
const router = express.Router()
const Message = require('./models');
const sendMail = require('./app');

const fs = require('fs');

const contents = fs.readFileSync('./prop.json');
const jsonContent = JSON.parse(contents);

const deliveries = jsonContent.deliveries || [];
const receivers = jsonContent.receivers || [];

let ms = [];
let mails = [];
let level;
let mss = new Set();
let mail = new Set();
deliveries.forEach(delivery => {
    level = delivery.logLevel

    delivery.microservices.forEach((service) => {
        mss.add(service);

    });
    ms = Array.from(mss);

    const teams = delivery.receivers
    teams.forEach((team) => {
        receivers.forEach((receiver) => {
            if (receiver.code === team) {
                mail.add(receiver.emails);
                mails = Array.from(mail)
            }
        })
    })
});


function createHtml(logLevel, message, serviceName,repeatCount, date ) {
    return `
        <div>
        <p style=""> Сервис: ${serviceName} : ${date}  : ${repeatCount}</p> 
        <p style="margun-buttom: -10 ">${logLevel}</p>
        Информация: ${message}
        </div>
    `;
}
router.get('/log', async function (req, res) {
    try {
        let logs = await Message.find({ level: level, serviceName: ms, checked: false })
        res.send(logs);
        var result = [];
        var obj = {};

        logs.forEach(function (log, i) {
            var str = JSON.stringify(log);
            if (!obj[str]) {
                obj[str] = 1;
            } else {
                obj[str]++;
            }
            // log.checked = true;
            // log.save();
        });
        for (var i in obj) {
            let x = JSON.parse(i);
            x.count = obj[i];
            result.push(x);
        }
        console.log(result);
       
        const template = result.map((log) => {
            return createHtml(log.level, log.message, log.serviceName,log.count, log.date);
        });


        let mess = template.join("<hr /> ");
        //  await sendMail(mails, result.serviceName, mess);

        // res.send(logs);
        //console.log(mess);

    } catch (e) {
        console.log(e)
    }
})

module.exports = router;
