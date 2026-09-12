FROM node:22

WORKDIR /app

# Installer exactement les dépendances du package-lock.json
COPY package.json package-lock.json ./
RUN npm ci

# Copier le code React/Vite
COPY . .

EXPOSE 5173

# Vite accessible depuis l'hôte + HMR
CMD ["npm", "run", "dev", "--", "--host", "0.0.0.0"]