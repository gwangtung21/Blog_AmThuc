import axios from 'axios';

const API_BASE_URL = 'http://localhost/api'; // Adjust the base URL as needed

// Fetch all articles
export const fetchArticles = async () => {
    const response = await axios.get(`${API_BASE_URL}/articles`);
    return response.data;
};

// Fetch a single article by ID
export const fetchArticleById = async (id) => {
    const response = await axios.get(`${API_BASE_URL}/articles/${id}`);
    return response.data;
};

// Submit a new article
export const submitArticle = async (articleData) => {
    const response = await axios.post(`${API_BASE_URL}/articles`, articleData);
    return response.data;
};

// Update an existing article
export const updateArticle = async (id, articleData) => {
    const response = await axios.put(`${API_BASE_URL}/articles/${id}`, articleData);
    return response.data;
};

// Delete an article
export const deleteArticle = async (id) => {
    const response = await axios.delete(`${API_BASE_URL}/articles/${id}`);
    return response.data;
};

// Fetch all users
export const fetchUsers = async () => {
    const response = await axios.get(`${API_BASE_URL}/users`);
    return response.data;
};

// Add a new user
export const addUser = async (userData) => {
    const response = await axios.post(`${API_BASE_URL}/users`, userData);
    return response.data;
};

// Update an existing user
export const updateUser = async (id, userData) => {
    const response = await axios.put(`${API_BASE_URL}/users/${id}`, userData);
    return response.data;
};

// Delete a user
export const deleteUser = async (id) => {
    const response = await axios.delete(`${API_BASE_URL}/users/${id}`);
    return response.data;
};