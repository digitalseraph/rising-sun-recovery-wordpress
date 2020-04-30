#!/usr/bin/env bash
#
# Upgrade Wordpress

PROJECT_DIR="$(docker-compose config | grep ABS_PATH | sed 's/^\(\s\|[^\/]\)*\(\/\)/\//' | sed 's/\(:ABS_PATH.*\)$//')"
WORDPRESS_PERSISTENCE="${PROJECT_DIR}/docker/volumes/wordpress_data"
MARIABD_PERSISTENCE="${PROJECT_DIR}/docker/volumes/mariadb_data"

update_docker_image() {
    cd ${PROJECT_DIR}
    docker pull bitnami/wordpress:latest
}

stop_container() {
    cd ${PROJECT_DIR}
    docker-compose stop wordpress
    docker-compose stop mariadb

}

snapshot_app_state() {
    cd ${PROJECT_DIR}
    rsync -a "${WORDPRESS_PERSISTENCE}" "${WORDPRESS_PERSISTENCE}.bkp."$(date +%Y%m%d-%H.%M.%S)
    rsync -a "${MARIABD_PERSISTENCE}" "${MARIABD_PERSISTENCE}.bkp."$(date +%Y%m%d-%H.%M.%S)
}

remove_container() {
    cd ${PROJECT_DIR}
    docker-compose rm wordpress
}

run_new_image() {
    cd ${PROJECT_DIR}
    docker-compose up wordpress
}

update_docker_image