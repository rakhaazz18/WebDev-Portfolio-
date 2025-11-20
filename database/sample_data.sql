-- ================================================================
-- PORTFOLIO DATABASE - SAMPLE DATA
-- Created: 2025-11-10
-- Description: Insert sample data for testing
-- ================================================================

USE `portfolio_db`;

-- ================================================================
-- SAMPLE DATA: users
-- ================================================================
INSERT INTO `users` (`name`, `email`, `password`, `email_verified_at`, `created_at`, `updated_at`) VALUES
('Rakha Aziz', 'rakha@example.com', '$2y$12$LQv3c1yqBWVHxkd0LHAkCOYz6TtxMQJqhN8/LewY5NANClx6vgdpe', NOW(), NOW(), NOW()),
('John Doe', 'john@example.com', '$2y$12$LQv3c1yqBWVHxkd0LHAkCOYz6TtxMQJqhN8/LewY5NANClx6vgdpe', NOW(), NOW(), NOW());
-- Password untuk semua user: 'password'

-- ================================================================
-- SAMPLE DATA: posts
-- ================================================================
INSERT INTO `posts` (`title`, `content`, `author`, `published`, `created_at`, `updated_at`) VALUES
('Welcome to My Portfolio', 'This is my first blog post on my portfolio website. I am excited to share my journey as a web developer.', 'Rakha Aziz', 1, NOW(), NOW()),
('Learning Laravel Framework', 'Laravel is an amazing PHP framework that makes web development enjoyable and creative. Here are my thoughts...', 'Rakha Aziz', 1, NOW(), NOW()),
('My Journey in Web Development', 'Started from HTML and CSS, now working with modern frameworks and tools...', 'Rakha Aziz', 0, NOW(), NOW());

-- ================================================================
-- SAMPLE DATA: experiences
-- ================================================================
INSERT INTO `experiences` (`position`, `company`, `location`, `description`, `image_url`, `start_date`, `end_date`, `is_current`, `created_at`, `updated_at`) VALUES
('Full Stack Developer', 'Tech Solutions Inc', 'Jakarta, Indonesia', 'Developed and maintained web applications using Laravel, Vue.js, and MySQL. Collaborated with cross-functional teams to deliver high-quality software solutions.', '/images/companies/tech-solutions.png', '2023-01-15', NULL, 1, NOW(), NOW()),
('Frontend Developer', 'Creative Digital Agency', 'Bandung, Indonesia', 'Created responsive and interactive user interfaces using React and Tailwind CSS. Worked on multiple client projects ranging from e-commerce to corporate websites.', '/images/companies/creative-digital.png', '2021-06-01', '2022-12-31', 0, NOW(), NOW()),
('Web Developer Intern', 'StartUp Innovation', 'Surabaya, Indonesia', 'Assisted in developing company website and internal tools. Learned modern web development practices and version control with Git.', '/images/companies/startup-innovation.png', '2020-09-01', '2021-05-31', 0, NOW(), NOW());

-- ================================================================
-- SAMPLE DATA: skills
-- ================================================================
INSERT INTO `skills` (`name`, `category`, `proficiency`, `description`, `created_at`, `updated_at`) VALUES
-- Frontend Skills
('HTML5', 'Frontend', 95, 'Advanced knowledge in semantic HTML and accessibility', NOW(), NOW()),
('CSS3', 'Frontend', 90, 'Expert in modern CSS, Flexbox, Grid, and animations', NOW(), NOW()),
('JavaScript', 'Frontend', 85, 'Proficient in ES6+, async/await, and modern JS features', NOW(), NOW()),
('React', 'Frontend', 80, 'Experience with hooks, context API, and state management', NOW(), NOW()),
('Vue.js', 'Frontend', 75, 'Familiar with Vue 3, Composition API, and Vuex', NOW(), NOW()),
('Tailwind CSS', 'Frontend', 88, 'Expert in utility-first CSS framework', NOW(), NOW()),

-- Backend Skills
('PHP', 'Backend', 85, 'Strong understanding of OOP and modern PHP practices', NOW(), NOW()),
('Laravel', 'Backend', 82, 'Experience with Eloquent, migrations, and API development', NOW(), NOW()),
('Node.js', 'Backend', 70, 'Familiar with Express.js and REST API development', NOW(), NOW()),
('Python', 'Backend', 65, 'Basic knowledge of Django and Flask frameworks', NOW(), NOW()),

-- Database Skills
('MySQL', 'Database', 80, 'Proficient in query optimization and database design', NOW(), NOW()),
('PostgreSQL', 'Database', 70, 'Experience with advanced SQL features', NOW(), NOW()),
('MongoDB', 'Database', 60, 'Basic knowledge of NoSQL databases', NOW(), NOW()),

-- Tools & Others
('Git', 'Tools', 85, 'Expert in version control and Git workflows', NOW(), NOW()),
('Docker', 'Tools', 65, 'Familiar with containerization and Docker Compose', NOW(), NOW()),
('VS Code', 'Tools', 90, 'Power user with custom configurations and extensions', NOW(), NOW()),
('Figma', 'Design', 75, 'UI/UX design and prototyping', NOW(), NOW());

-- ================================================================
-- SAMPLE DATA: projects
-- ================================================================
INSERT INTO `projects` (`user_id`, `title`, `description`, `image_url`, `demo_url`, `github_url`, `technologies`, `completed_date`, `is_featured`, `created_at`, `updated_at`) VALUES
(1, 'E-Commerce Platform', 'Full-featured online shopping platform with product management, shopping cart, payment integration, and order tracking. Built with Laravel backend and React frontend.', '/images/projects/ecommerce.jpg', 'https://demo-ecommerce.example.com', 'https://github.com/username/ecommerce-platform', '["Laravel", "React", "MySQL", "Tailwind CSS", "Stripe API"]', '2024-08-15', 1, NOW(), NOW()),

(1, 'Portfolio Website CMS', 'Content Management System specifically designed for portfolio websites. Features include project showcase, blog, contact form, and admin dashboard.', '/images/projects/portfolio-cms.jpg', 'https://portfolio-cms.example.com', 'https://github.com/username/portfolio-cms', '["Laravel", "Vue.js", "MySQL", "Bootstrap"]', '2024-06-20', 1, NOW(), NOW()),

(1, 'Task Management App', 'Collaborative task management application with real-time updates, team collaboration features, and progress tracking. Perfect for agile teams.', '/images/projects/task-manager.jpg', 'https://task-app.example.com', 'https://github.com/username/task-manager', '["Node.js", "React", "MongoDB", "Socket.io"]', '2024-03-10', 1, NOW(), NOW()),

(1, 'Weather Dashboard', 'Real-time weather dashboard that displays current weather, forecasts, and weather maps. Integrates with OpenWeatherMap API.', '/images/projects/weather-dashboard.jpg', 'https://weather-dash.example.com', 'https://github.com/username/weather-dashboard', '["JavaScript", "HTML5", "CSS3", "OpenWeather API"]', '2023-12-05', 0, NOW(), NOW()),

(1, 'Restaurant Reservation System', 'Online reservation system for restaurants with table management, booking calendar, and customer notifications.', '/images/projects/restaurant-booking.jpg', NULL, 'https://github.com/username/restaurant-booking', '["Laravel", "MySQL", "jQuery", "Bootstrap"]', '2023-09-18', 0, NOW(), NOW());

-- ================================================================
-- SAMPLE DATA: project_skill (Relationships)
-- ================================================================

-- E-Commerce Platform skills
INSERT INTO `project_skill` (`project_id`, `skill_id`, `created_at`, `updated_at`)
SELECT 1, id, NOW(), NOW() FROM `skills` WHERE `name` IN ('Laravel', 'React', 'MySQL', 'Tailwind CSS', 'JavaScript');

-- Portfolio CMS skills
INSERT INTO `project_skill` (`project_id`, `skill_id`, `created_at`, `updated_at`)
SELECT 2, id, NOW(), NOW() FROM `skills` WHERE `name` IN ('Laravel', 'Vue.js', 'MySQL', 'PHP');

-- Task Management App skills
INSERT INTO `project_skill` (`project_id`, `skill_id`, `created_at`, `updated_at`)
SELECT 3, id, NOW(), NOW() FROM `skills` WHERE `name` IN ('Node.js', 'React', 'MongoDB', 'JavaScript');

-- Weather Dashboard skills
INSERT INTO `project_skill` (`project_id`, `skill_id`, `created_at`, `updated_at`)
SELECT 4, id, NOW(), NOW() FROM `skills` WHERE `name` IN ('JavaScript', 'HTML5', 'CSS3');

-- Restaurant Reservation System skills
INSERT INTO `project_skill` (`project_id`, `skill_id`, `created_at`, `updated_at`)
SELECT 5, id, NOW(), NOW() FROM `skills` WHERE `name` IN ('Laravel', 'MySQL', 'PHP');

-- ================================================================
-- VERIFY DATA
-- ================================================================
SELECT COUNT(*) as total_users FROM users;
SELECT COUNT(*) as total_posts FROM posts;
SELECT COUNT(*) as total_experiences FROM experiences;
SELECT COUNT(*) as total_skills FROM skills;
SELECT COUNT(*) as total_projects FROM projects;
SELECT COUNT(*) as total_project_skills FROM project_skill;

-- ================================================================
-- USEFUL QUERIES FOR TESTING
-- ================================================================

-- Get all projects with their skills
SELECT 
    p.title,
    GROUP_CONCAT(s.name SEPARATOR ', ') as skills
FROM projects p
LEFT JOIN project_skill ps ON p.id = ps.project_id
LEFT JOIN skills s ON ps.skill_id = s.id
GROUP BY p.id, p.title;

-- Get featured projects
SELECT * FROM projects WHERE is_featured = 1;

-- Get current experiences
SELECT * FROM experiences WHERE is_current = 1;

-- Get skills by category
SELECT category, COUNT(*) as skill_count 
FROM skills 
GROUP BY category;

-- Get user with their projects count
SELECT 
    u.name,
    u.email,
    COUNT(p.id) as project_count
FROM users u
LEFT JOIN projects p ON u.id = p.user_id
GROUP BY u.id;
