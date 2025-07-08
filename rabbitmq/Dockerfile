FROM rabbitmq:3.8.16-management-alpine

COPY ["./plugins/rabbitmq_delayed_message_exchange-3.8.17.8f537ac.ez", "/plugins/"]

RUN chmod 777 /plugins/rabbitmq_delayed_message_exchange-3.8.17.8f537ac.ez \
    && rabbitmq-plugins enable --offline rabbitmq_delayed_message_exchange \
    && rm -f /var/cache/apk/*
