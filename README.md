# Evolutio todo app backend

You can find Express.js backend for Evolutio todo in branch `node/express`.
You can find Symfony backend (bare install with no extra packages) for Evolutio
todo in branch `symfony/bare`.
You can find Symfony backend (with Api Platform) for Evolutio todo in branch `symfony/api-platform`.

# What is same?

All backends have same API endpoints and same database structure.

id: uuid
text: string 
done: boolean (default: false)
created_at: datetime (default: now)
updated_at: datetime (default: null)

Oredring is done by `created_at` field, default ordering is `DESC`.
RDMS: MySQL/MariaDB
All responses and request body are in JSON format. You can find API endpoints in
branches README.md files.

# What is different?

Api Platform backend have different ordering system. There is no docker for it. 
Express.js backend have different db, MariaDB instead of MySQL. And it have 
complete CI/CD pipeline with docker, docker-compose, github actions.
You can test backend on http://165.232.121.71:8000/api .

Check branches README.md files for more infos, or contact me on 
stipo@udruga-liberato.hr.
