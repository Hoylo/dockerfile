ARG REDIS_VER
FROM redis:${REDIS_VER}
RUN echo "http://mirrors.aliyun.com/alpine/latest-stable/main/" > /etc/apk/repositories \
    && echo "http://mirrors.aliyun.com/alpine/latest-stable/community/" >> /etc/apk/repositories \
    && apk update \
    && apk add --no-cache curl bash tree tzdata \
    && rm -f /var/cache/apk/*
COPY redis.conf /usr/local/etc/redis/redis.conf
CMD [ "redis-server", "/usr/local/etc/redis/redis.conf" ]
