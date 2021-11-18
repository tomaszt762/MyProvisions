var urlopen = require('urlopen');
var options = {
    target: 'dpkafka://kafka-cluster?RequestTopic=test&ConsumerGroup=datapower&Key=4234234',
    data: {"name":"adam"},
    timeout: 10
};

urlopen.open(options, function (error, response) {
    if (error) {
        session.output.write ("urlopen connect error: " + JSON.stringify(error));
    } else {

            response.readAsBuffer(function(error, data) {
                if (error) {
                    session.output.write("readAsBuffer error: " + JSON.stringify(error));
                } else {
                    session.output.write(data);
                } 
            });
  
    }
});

dpkafka:///<cluster-name>?RequestTopic=<topic>[&ReplyTopic=<topic>&ConsumerGroup=<cgroup-name>][&Key=<key>[&KeyType=binary]][&TimeOut=<timeout>]
