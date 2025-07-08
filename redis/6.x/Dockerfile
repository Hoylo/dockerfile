FROM redis:6.2.3-alpine3.13
RUN apk update \
    && apk add --no-cache curl bash tree tzdata \
    && rm -f /var/cache/apk/*
CMD [ "redis-server"]
