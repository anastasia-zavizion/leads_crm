export default function common() {
    function confirm() {
        return window.confirm("Are you sure?");
    }

    return { confirm };
}

