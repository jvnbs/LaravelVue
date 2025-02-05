# Use an official Nginx or Apache image as the base image
FROM nginx:latest

# Set the working directory
WORKDIR /usr/share/nginx/html

# Copy your project files into the container
COPY . .

# Expose the port the app runs on (usually port 80 for web apps)
EXPOSE 80

# Start Nginx (or Apache) when the container runs
CMD ["nginx", "-g", "daemon off;"]
