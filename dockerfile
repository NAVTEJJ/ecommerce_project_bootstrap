# Use OpenJDK 17 as base image
FROM openjdk:17-jdk-slim

# Install Tomcat
RUN apt-get update && apt-get install -y wget && \
    wget https://archive.apache.org/dist/tomcat/tomcat-9/v9.0.89/bin/apache-tomcat-9.0.89.tar.gz && \
    tar xvf apache-tomcat-9.0.89.tar.gz && \
    mv apache-tomcat-9.0.89 /usr/local/tomcat

# Set working directory
WORKDIR /usr/local/tomcat

# Copy WAR file into Tomcat’s webapps folder
COPY ./ECOMMERCE_PROJECT_BOOTSTRAP.war /usr/local/tomcat/webapps/ROOT.war

# Expose Tomcat port
EXPOSE 8080

# Start Tomcat
CMD ["sh", "/usr/local/tomcat/bin/catalina.sh", "run"]
