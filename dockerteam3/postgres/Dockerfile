# Use official PostgreSQL image
FROM postgres:15

# Set environment variables for database initialization
ENV POSTGRES_HOST=postgresql
ENV POSTGRES_DB=mydb
ENV POSTGRES_USER=myuser
ENV POSTGRES_PASSWORD=mypassword

COPY dockerteam3/postgres/init.sql /docker-entrypoint-initdb.d/

# Expose PostgreSQL default port
EXPOSE 5432


# Start PostgreSQL
CMD ["postgres"]
#