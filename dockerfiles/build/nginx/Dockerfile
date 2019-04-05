FROM nginx:1.15.8

MAINTAINER Fernando de Assis <fernandoassissr@gmal.com>

COPY nginx.conf /etc/nginx/nginx.conf

COPY virtual_server/location /etc/nginx/conf.d/location
COPY virtual_server/fastcgi.conf /etc/nginx/conf.d/fastcgi.conf
COPY virtual_server /etc/nginx/conf.d

EXPOSE 80