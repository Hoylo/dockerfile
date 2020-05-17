ARG NGINX_VER

FROM nginx:${NGINX_VER}
RUN echo "http://mirrors.aliyun.com/alpine/latest-stable/main/" > /etc/apk/repositories && \
    echo "http://mirrors.aliyun.com/alpine/latest-stable/community/" >> /etc/apk/repositories
RUN apk update \
    && apk add --no-cache curl bash tree tzdata ca-certificates \
