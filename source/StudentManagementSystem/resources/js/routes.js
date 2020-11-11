import Dashboard from "./components/Dashboard";
import Students from "./components/students/Students";
import CreateStudent from "./components/students/CreateStudent";
import StudentProfile from "./components/students/StudentProfile";

const routes = [
    {
        path: '/',
        name: 'home',
        component: Dashboard
    },
    {
        path: '/students',
        name: 'students',
        component: Students
    },
    {
        path: '/students/create',
        name: 'createStudent',
        component: CreateStudent
    },
    {
        path: '/students/id=:id',
        name: 'studentDetail',
        component: StudentProfile
    }
]

export default routes;
