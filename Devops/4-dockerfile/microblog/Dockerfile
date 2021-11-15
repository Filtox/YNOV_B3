FROM ubuntu
COPY requirements.txt .
RUN apt-get -y update && apt-get install -y python3 && apt-get install -y pip && pip3 install -qr requirements.txt
COPY . ./app
EXPOSE 5000
WORKDIR ./app
CMD ["./boot.sh"]
