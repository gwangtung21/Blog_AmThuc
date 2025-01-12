export interface Article {
    id: number;
    title: string;
    content: string;
    authorId: number;
    createdAt: string;
    updatedAt: string;
}

export interface User {
    id: number;
    username: string;
    email: string;
    role: 'author' | 'admin';
    createdAt: string;
    updatedAt: string;
}

export interface ApiResponse<T> {
    data: T;
    message: string;
    status: number;
}