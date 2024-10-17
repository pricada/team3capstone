-- Create football_teams table
CREATE TABLE football_teams (
    team_id SERIAL PRIMARY KEY,
    team_name VARCHAR(100) NOT NULL,
    city VARCHAR(100) NOT NULL,
    country VARCHAR(100) NOT NULL,
    established_year INTEGER NOT NULL,
    stadium VARCHAR(100) NOT NULL
);

-- Insert sample data into football_teams
INSERT INTO football_teams (team_name, city, country, established_year, stadium)
VALUES
('Manchester United', 'Manchester', 'England', 1878, 'Old Trafford'),
('Real Madrid123', 'Madrid', 'Spain', 1902, 'Santiago Bernabéu'),
('Bayern Munich', 'Munich', 'Germany', 1900, 'Allianz Arena'),
('Juventus', 'Turin', 'Italy', 1897, 'Allianz Stadium'),
('Paris Saint-Germain', 'Paris', 'France', 1970, 'Parc des Princes'),
('Barcelona', 'Barcelona', 'Spain', 1899, 'Camp Nou');

