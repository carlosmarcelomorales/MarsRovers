all: help

.PHONY : help
help : Makefile
	@sed -n 's/^##\s//p' $<

SHELL := /bin/bash
ROOT_DIR := $(dir $(abspath $(lastword $(MAKEFILE_LIST))))
UID=$(shell id -u)

.PHONY : start

##    build: Build services
build:
	@docker-compose build

##    start: start docker image
start:
	@docker-compose up -d

##    stop:	stops containers
stop:
	@docker-compose down

##   remove: stops all containers and delete them
remove:
	@docker-compose -f docker-compose.yml rm -s -f

##    init all the application
init: build start
