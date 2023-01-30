import { FormControl, InputLabel, MenuItem, Select } from "@material-ui/core";
import useNoticias from "../hooks/useNoticias";

const CATEGORIAS = [
    { value: "general", label: "General" },
    { value: "business", label: "Negocios" },
    { value: "entertainment", label: "Entretenimiento" },
    { value: "health", label: "Salud" },
    { value: "science", label: "Ciencia" },
    { value: "sports", label: "Deportes" },
    { value: "technology", label: "Tecnología" },
];

const Formulario = () => {
    const { categoria, handleChangeCategoria } = useNoticias();

    return (
        <form>
            <FormControl variant="filled" fullWidth>
                <InputLabel>Categoría</InputLabel>
                <Select
                    label="Categoría"
                    value={categoria}
                    onChange={handleChangeCategoria}
                >
                    {CATEGORIAS.map((categoria) => (
                        <MenuItem key={categoria.value} value={categoria.value}>
                            {categoria.label}
                        </MenuItem>
                    ))}
                </Select>
            </FormControl>
        </form>
    );
};

export default Formulario;
