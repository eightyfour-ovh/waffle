ARG FRAKEN_VERSION='1.4.4'
ARG PHP_VERSION='8.4.5'
ARG OS='bookworm'

FROM composer:latest AS composer
FROM dunglas/frankenphp:${FRAKEN_VERSION}-php${PHP_VERSION}-${OS}

# add additional extensions here:
RUN install-php-extensions \
	pdo_mysql \
	gd \
	intl \
	zip \
	opcache \
    xdebug;

RUN cp $PHP_INI_DIR/php.ini-development $PHP_INI_DIR/php.ini

COPY --from=composer /usr/bin/composer /usr/bin/composer

ARG USER=app

RUN \
	# Use "adduser -D ${USER}" for alpine based distros
	useradd ${USER}; \
	# Add additional capability to bind to port 80 and 443
	setcap CAP_NET_BIND_SERVICE=+eip /usr/local/bin/frankenphp; \
	# Give write access to /data/caddy and /config/caddy
	chown -R ${USER}:${USER} /data/caddy; chown -R ${USER}:${USER} /config/caddy; \
    mkdir -p /home/${USER}/.cache; chown -R ${USER}:${USER} /home/${USER}/.cache;

USER ${USER}

COPY . /app/public
